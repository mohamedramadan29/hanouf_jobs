<?php

namespace App\Livewire\Chat;

use App\Models\admin\Company;
use App\Models\User;
use App\Models\website\Coversation;
use App\Models\website\Message;
use Livewire\Component;

class Sendmessage extends Component
{

    public $listeners = ['update_dataCompany', 'update_dataUsers','dispatchMessageSend'];
    public $message_body;
    public $selected_conversation;
    public $recieverUsers;
    public $auth_username;
    public $sender;
    public $create_message;
    public $sender_type;

    public function update_dataCompany(Coversation $coversation, User $reciever)
    {
        $this->selected_conversation = $coversation;
        $this->recieverUsers = $reciever;
    }

    public function update_dataUsers(Coversation $coversation, Company $reciever)
    {
        $this->selected_conversation = $coversation;
        $this->recieverUsers = $reciever;
    }

    public function mount()
    {
        if (auth()->guard('company')->check()) {
            $this->img_path = 'assets/uploads/users/';
            $this->auth_username = auth()->guard('company')->user()->username;
            $this->sender = auth()->guard('company')->user();
            $this->sender_type = 'company';
        } else {
            $this->img_path = 'assets/uploads/companies/';
            $this->auth_username = auth()->user()->username; // الحارس الافتراضي للمستخدم العادي
            $this->sender = auth()->user();
            $this->sender_type='employee';
        }
    }

    public function sendmessage()
    {
        if ($this->message_body == null) {
            return null;
        }
        $this->create_message = Message::create([
            'conversation_id' => $this->selected_conversation->id,
            'sender_username' => $this->auth_username,
            'receiver_username' => $this->recieverUsers->username,
            'body' => $this->message_body,
            'type'=> $this->sender_type,
        ]);
        //dd('message send');
        $this->selected_conversation->last_time_message = $this->create_message->created_at;
        $this->selected_conversation->save();
        $this->reset('message_body');
        ////// Make Function To  Make Push Message Without reload
        $this->dispatch('pushMessage', $this->create_message->id)->to('chat.Chatbox');
        // refresh chat list
        $this->dispatch('refresh')->to('chat.chatlist');
        ////////// For start RealTimeChat
        $this->dispatch('dispatchMessageSend')->self();
    }

    public function dispatchMessageSend()
    {
        if (auth()->guard('company')->check()){
            broadcast(new \App\Events\SendMessage
            ($this->sender, $this->recieverUsers, $this->selected_conversation,$this->create_message));
        }else{
            broadcast(new \App\Events\SendMessage2
            ($this->sender, $this->recieverUsers, $this->selected_conversation,$this->create_message));
        }
    }

    public function render()
    {
        return view('livewire.chat.sendmessage');
    }
}

<?php

namespace App\Livewire\Chat;

use App\Models\admin\Company;
use App\Models\User;
use App\Models\website\Coversation;
use App\Models\website\Message;
use Livewire\Component;

class Chatbox extends Component
{

    //protected $listeners = ['load_conversationCompany','load_conversationUsers','pushMessage'];
    public $reciever;
    public $selected_conversation;
    public $recieverUsers;
    public $messages;
    public $auth_username;

    public $auth_id;
    public $event_name;
    public $chat_page;

    public function load_conversationCompany(Coversation $coversation, User $reciever)
    {
        $this->selected_conversation = $coversation;
        $this->recieverUsers = $reciever;
        $this->messages = Message::where('conversation_id', $this->selected_conversation->id)->get();
        // dd($this->messages);
    }

    public function load_conversationUsers(Coversation $coversation, Company $reciever)
    {
        $this->selected_conversation = $coversation;
        $this->recieverUsers = $reciever;
        $this->messages = Message::where('conversation_id', $this->selected_conversation->id)->get();
        // dd($this->messages);
    }

    public function pushMessage($message)
    {
        $newMessage = Message::find($message);
        $this->messages->push($newMessage);
    }

    public function getListeners()
    {
        if (auth()->guard('company')->check()) {
            $auth_id = auth()->guard('company')->user()->id;
            $this->event_name = 'SendMessage';
            $this->chat_page = 'chat';

        } else {
            $auth_id = auth()->user()->id; // الحارس الافتراضي للمستخدم العادي
            $this->event_name = 'SendMessage2';
            $this->chat_page = 'chat2';
        }
        return [
            // "echo-private:chat.{$auth_id},MessageSent" => 'MessageReceived',
            "echo-private:$this->chat_page.{$auth_id},$this->event_name" => 'broadcastMessage', 'load_conversationCompany', 'load_conversationUsers', 'pushMessage',
        ];
    }

    public function broadcastMessage($event)
    {
        dd('event');
        dd($event);
    }


    public function mount()
    {
        if (auth()->guard('company')->check()) {
            $this->img_path = 'assets/uploads/users/';
            $this->auth_username = auth()->guard('company')->user()->username;
        } else {
            $this->img_path = 'assets/uploads/companies/';
            $this->auth_username = auth()->user()->username; // الحارس الافتراضي للمستخدم العادي
        }
    }

    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}

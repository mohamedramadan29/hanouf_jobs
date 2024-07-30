<?php

namespace App\Livewire\Chat;

use App\Models\admin\Company;
use App\Models\User;
use App\Models\website\Coversation;
use Livewire\Component;

class Chatlist extends Component
{

    public $conversations;
    public $auth_username;
    public $recieverUsers;
    public $img_path;
    public $selected_conversation;

    public $listeners=['refresh'];
    public function mount()
    {
        if (auth()->guard('company')->check()) {
            $this->img_path = 'assets/uploads/users/';
            $this->auth_username = auth()->guard('company')->user()->username;
        } else {
            $this->img_path = 'assets/uploads/companies/';
            $this->auth_username = auth()->user()->username; // الحارس الافتراضي للمستخدم العادي
        }
        $this->conversations = Coversation::where('sender_username', $this->auth_username)->
        orWhere('receiver_username', $this->auth_username)->orderBy('last_time_message','DESC')->get();
    }

    ////// Start Get Users I'm Make chats It
    ///
    public function getUsers(Coversation $conversation, $request)
    {
        if (auth()->guard('company')->check()) {
            $this->recieverUsers = User::firstwhere('username', $conversation->receiver_username);
        } else {
            $this->recieverUsers = Company::firstwhere('username', $conversation->sender_username);
        }
        if (isset($request)) {
            return $this->recieverUsers->$request;
        }
    }


    public function ChatUserSelected(Coversation $coversation, $reciver_username)
    {
        $this->selected_conversation = $coversation;
        /////// Check If The Opened Company Or User
        if (auth()->guard('company')->check()) {
            $this->recieverUsers = User::where('username', $reciver_username)->first();
            $this->dispatch('load_conversationCompany', $this->selected_conversation, $this->recieverUsers)->to('chat.Chatbox');
            $this->dispatch('update_dataCompany', $this->selected_conversation, $this->recieverUsers)->to('chat.Sendmessage');
        } else {
            $this->recieverUsers = Company::where('username', $reciver_username)->first();
            $this->dispatch('load_conversationUsers', $this->selected_conversation, $this->recieverUsers)->to('chat.Chatbox');
            $this->dispatch('update_dataUsers', $this->selected_conversation, $this->recieverUsers)->to('chat.Sendmessage');
        }


    }

    public function render()
    {
        return view('livewire.chat.chatlist');
    }
}

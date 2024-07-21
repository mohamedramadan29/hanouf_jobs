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
    public $sender_logo;
    public $selected_conversation;
    public $recieverUsers;
    public $messages;
    public $auth_username;
    public $auth_id;
    public $event_name;
    public $chat_page;

    public $img_path;


    public function mount()
    {
        if (auth()->guard('company')->check()) {
            $this->img_path = 'assets/uploads/users/';
            $this->auth_username = auth()->guard('company')->user()->username;
            $this->auth_id = auth()->guard('company')->user()->id;
            $this->sender_logo = auth()->guard('company')->user()->logo;
        } else {
            $this->img_path = 'assets/uploads/companies/';
            $this->auth_username = auth()->user()->username; // الحارس الافتراضي للمستخدم العادي
            $this->auth_id = auth()->user()->id;
            $this->sender_logo = auth()->user()->logo;
        }
    }

    public function getListeners()
    {
       // $auth_id = Auth::id();
        if (auth()->guard('company')->check()) {
            $auth_id = auth()->guard('company')->user()->id;

        }else{
            $auth_id = auth()->user()->id;
        }

//        return [
//            "echo-private:chat.{$auth_id},SendMessage" => 'broadcastMessage',
//            'load_conversationCompany', 'load_conversationUsers', 'pushMessage'
//        ];

        return [
            "echo-private:chat.{$auth_id},SendMessage" => 'broadcastMessage',
            "echo-private:chat2.{$auth_id},SendMessage2" => 'broadcastMessage2',
            'load_conversationCompany', 'load_conversationUsers', 'pushMessage'
        ];
    }

    public function broadcastMessage($event)
    {
        //$this->dispatch('refresh')->to('chat.chat-list');


        $broadcatsmessage = Message::find($event['body']);
        $broadcatsmessage->read = 1;
        $this->pushMessage($broadcatsmessage->id);
    }

    public function broadcastMessage2($event)
    {

        //$this->dispatch('refresh')->to('chat.chat-list');
        $broadcatsmessage2 = Message::find($event['body']);
        $broadcatsmessage2->read = 1;

        $this->pushMessage($broadcatsmessage2->id);
    }


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

    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}

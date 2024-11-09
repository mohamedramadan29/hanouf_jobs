<?php

namespace App\Livewire\Chat;

use App\Http\Traits\Upload_Images;
use App\Models\admin\Company;
use App\Models\User;
use App\Models\website\Coversation;
use App\Models\website\Message;
use App\Notifications\NewMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Livewire\WithFileUploads;
class Sendmessage extends Component
{
    use WithFileUploads;
    use Upload_Images;

    public $listeners = ['update_dataCompany', 'update_dataUsers', 'dispatchMessageSend'];
    public $message_body;
    public $file;
    public $selected_conversation;
    public $recieverUsers;
    public $auth_username;
    public $sender;
    public $create_message;
    public $sender_type;
    public $notification_Model;

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
            $this->sender_type = 'employee';

        }
    }

    protected $rules = [
        'file' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:10240', // 10MB
        'message_body' => 'required|string',
    ];

    protected $messages = [
        'file.mimes' => 'الملفات يجب أن تكون بصيغة: jpg, jpeg, png, pdf, doc, docx.',
        'file.max' => 'حجم الملف يجب أن لا يتجاوز 10 ميجابايت.',
        'message_body.string' => 'يجب أن يكون نص الرسالة من نوع نصي.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function sendmessage()
    {
        $this->validate();
        if ($this->message_body == null && $this->file == null)  {
            return null;
        }
        $filePath = null;
        if ($this->file) {
            $filePath = $this->file->store('users_chat','public');
        }
        $this->create_message = Message::create([
            'conversation_id' => $this->selected_conversation->id,
            'sender_username' => $this->auth_username,
            'receiver_username' => $this->recieverUsers->username,
            'body' => $this->message_body,
            'files' => $filePath,
            'type' => $this->sender_type,

        ]);
        if ($this->sender_type == 'company') {
            $user = User::where('username', $this->recieverUsers->username)->first();

        } elseif ($this->sender_type == 'employee') {
            $user = Company::where('username', $this->recieverUsers->username)->first();

        }

       // dd($sender_username);

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
        // Send Notification New Message To Reciever
        Notification::send($user, new NewMessage($this->selected_conversation->id, $this->auth_username));
    }

    public function dispatchMessageSend()
    {
        if (auth()->guard('company')->check()) {
            broadcast(new \App\Events\SendMessage
            ($this->sender, $this->recieverUsers, $this->selected_conversation, $this->create_message));
        } else {
            broadcast(new \App\Events\SendMessage2
            ($this->sender, $this->recieverUsers, $this->selected_conversation, $this->create_message));
        }
    }


    public function removeFile()
    {
        $this->file = null;
    }
    public function render()
    {
        return view('livewire.chat.sendmessage');
    }
}

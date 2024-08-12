<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendUnaccepedOfferToUser extends Notification
{
    use Queueable;


    private $user_id;
    private $adv_id,$adv_slug,$adv_name;
    private $refuse_reason,$more_refuse_info;
    public function __construct($user_id,$adv_id,$adv_slug,$adv_name,$refuse_reason,$more_refuse_info)
    {
        $this->user_id = $user_id;
        $this->adv_id = $adv_id;
        $this->adv_slug = $adv_slug;
        $this->adv_name = $adv_name;
        $this->refuse_reason = $refuse_reason;
        $this->more_refuse_info = $more_refuse_info;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
           'user_id'=>$this->user_id,
            'adv_id'=>$this->adv_id,
            'title'=>' للأسف ! تم رفض العرض الخاص بك ::  ',
            'adv_slug'=>$this->adv_slug,
            'adv_name'=>$this->adv_name,
            'refuse_reason'=>$this->refuse_reason,
            'more_refuse_info'=>$this->more_refuse_info,
        ];
    }
}

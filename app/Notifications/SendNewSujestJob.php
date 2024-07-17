<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendNewSujestJob extends Notification
{
    use Queueable;

    private $adv_id;
    private $adv_name,$adv_slug;

    public function __construct($adv_id,$adv_name,$adv_slug)
    {
        $this->adv_id = $adv_id;
        $this->adv_name = $adv_name;
        $this->adv_slug = $adv_slug;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'adv_id'=>$this->adv_id,
            'adv_name'=>$this->adv_name,
            'adv_slug'=>$this->adv_slug,
            'title'=>'  لديك اقتراح وظيفة جديدة : ',
        ];
    }
}

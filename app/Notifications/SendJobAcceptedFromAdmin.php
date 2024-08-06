<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendJobAcceptedFromAdmin extends Notification
{
    use Queueable;

    private $company_id;
    private $adv_id,$title,$slug;
    public function __construct($adv_id,$company_id,$title,$slug)
    {
        $this->adv_id = $adv_id;
        $this->company_id = $company_id;
        $this->title = $title;
        $this->slug = $slug;
    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }
    public function toArray(object $notifiable): array
    {
        return [
            'adv_id'=>$this->adv_id,
            'company_id'=>$this->company_id,
            'title_name'=>$this->title,
            'slug'=>$this->slug,
            'title'=>' تم تفعيل الأعلان الوظيفي  ',


        ];
    }
}

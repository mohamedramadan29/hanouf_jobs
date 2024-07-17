<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOfferRequestToCompanyJob extends Notification
{
    use Queueable;

    private $adv_id,$company_id,$adv_title;
    public function __construct($company_id,$adv_title,$adv_id)
    {
        $this->company_id = $company_id;
        $this->adv_id = $adv_id;
        $this->adv_title = $adv_title;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'company_id'=>$this->company_id,
            'adv_id'=>$this->adv_id,
            'adv_title'=>$this->adv_title,
            'title'=>' لديك خطاب توظيف جديد علي ',
        ];
    }
}

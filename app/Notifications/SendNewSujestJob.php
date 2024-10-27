<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendNewSujestJob extends Notification implements ShouldQueue
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
        return ['database','mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('اقتراح وظيفة جديدة')
            ->greeting('مرحباً!')
            ->line('لديك اقتراح وظيفة جديدة:')
            ->line("اسم الوظيفة: {$this->adv_name}")
            ->action('عرض الوظيفة', url("/job/{$this->adv_slug}"))
            ->line('نتمنى لك التوفيق!');
//            ->markdown('website.mails.send_new_subject_job', [
//                'adv_name' => $this->adv_name,
//                'adv_slug' => $this->adv_slug,
//            ]);
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

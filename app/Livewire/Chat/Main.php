<?php

namespace App\Livewire\Chat;

use Livewire\Component;

class Main extends Component
{
    public $username;
    public $adv_id;

   // protected $listeners = ['getadvuserdata'];
    public function getadvuserdata($adv_id,$username)
    {
        $adv_id = $this->adv_id;
        $username = $this->username;
        dd($adv_id);
    }
    public function render()
    {
        return view('livewire.chat.main');
    }
}

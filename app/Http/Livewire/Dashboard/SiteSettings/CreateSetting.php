<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use Livewire\Component;

class CreateSetting extends Component
{
    public $page;
    public function render()
    {
        $this->page = $_GET['page'];
        return view('livewire.dashboard.site-settings.create-setting')
        ->layout('layouts.admin');
    }
}

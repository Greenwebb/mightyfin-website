<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use Livewire\Component;

class SystemItemSettings extends Component
{
    public $settings, $title, $subtitle;
    public function render()
    {
        $this->settings = $_GET['settings'];
        return view('livewire.dashboard.site-settings.system-item-settings')
        ->layout('layouts.admin');
    }
}

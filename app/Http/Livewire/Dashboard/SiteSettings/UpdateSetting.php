<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use Livewire\Component;

class UpdateSetting extends Component
{
    public function render()
    {
        return view('livewire.dashboard.site-settings.update-setting')
        ->layout('layouts.admin');
    }
}

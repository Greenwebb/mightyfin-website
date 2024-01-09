<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use App\Traits\SettingTrait;
use Livewire\Component;

class SystemItemSettings extends Component
{
    use SettingTrait;
    public $settings, $title, $subtitle, $current_conf;
    public function render()
    {
        $this->settings = $_GET['settings'];
        $this->current_conf = $this->current_configs($_GET['settings']);
        // dd($this->current_conf);
            return view('livewire.dashboard.site-settings.system-item-settings')
            ->layout('layouts.admin');
    }
}

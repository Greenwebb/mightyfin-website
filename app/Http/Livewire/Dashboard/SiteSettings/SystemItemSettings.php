<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use App\Traits\LoanTrait;
use App\Traits\SettingTrait;
use Livewire\Component;

class SystemItemSettings extends Component
{
    use SettingTrait, LoanTrait;
    public $settings, $title, $subtitle, $current_conf;
    public $loan_products;
    public function render()
    {
        $this->settings = $_GET['settings'];
        $this->current_conf = $this->current_configs($_GET['settings']);
        
        // Loan Products
        $this->get_all_loan_products();


        return view('livewire.dashboard.site-settings.system-item-settings')
        ->layout('layouts.admin');
    }
    
}

<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use Livewire\Component;

class CreateSetting extends Component
{
    public $page;

    // Loan Product
    public $new_loan_name, $loan_release_date, $minimum_loan_principal_amount, $default_loan_principal_amount, $maximum_principal_amount, $loan_interest_method, $loan_interest_type;
    public $loan_interest_period, $minimum_loan_interest, $default_loan_interest, $maximum_loan_interest, $loan_duration_period, $minimum_loan_duration;
    public $default_loan_duration, $maximum_loan_duration, $default_num_of_repayments, $maximum_num_of_repayments, $minimum_num_of_repayments; 
    public $loan_decimal_place, $add_automatic_payments; 
    public $auto_payment_sources = [];
    public $loan_disbursed_by = []; 
    public $loan_repayment_cycle = [];

    
    
    public function render()
    {
        $this->page = $_GET['page'];
        return view('livewire.dashboard.site-settings.create-setting')
        ->layout('layouts.admin');
    }

    public function create_loan_product(){
        dd($this);
    }
}

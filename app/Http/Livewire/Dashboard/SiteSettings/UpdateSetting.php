<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use App\Traits\LoanTrait;
use Livewire\Component;

class UpdateSetting extends Component
{
    use LoanTrait;
    public $page, $loan_product;
    
    // Loan Product
    public $new_loan_name, $loan_release_date, $minimum_loan_principal_amount, $loan_interest_type;
    public $default_loan_principal_amount, $maximum_principal_amount, $loan_interest_method;
    public $loan_interest_period, $minimum_loan_interest, $default_loan_interest;
    public $maximum_loan_interest, $loan_duration_period, $minimum_loan_duration;

    public $default_loan_duration, $maximum_loan_duration, $default_num_of_repayments; 
    public $maximum_num_of_repayments, $minimum_num_of_repayments; 
    public function render()
    {
        $this->page = $_GET['page'];
        $this->id = $_GET['item_id'];

        switch ($_GET['page']) {
            case 'loan-product':
                $this->loan_product = $this->get_loan_product($_GET['item_id']);
                $this->set_loan_product_values();
            break;
            
            default:
            break;
        }

        return view('livewire.dashboard.site-settings.update-setting')
        ->layout('layouts.admin');
    }


    
    public function update_loan_product(){
        dd($this);
    }



    // ---- Setters
    public function set_loan_product_values(){
        $this->new_loan_name = $this->loan_product->name; 
        $this->loan_release_date = $this->loan_product->release_date; 
        // $this->loan_interest_type;
        $this->loan_interest_method = $this->loan_product->release_date;
        
        $this->loan_duration_period = $this->loan_product; 
        $this->loan_interest_period = $this->loan_product;

        $this->minimum_loan_principal_amount = $this->loan_product->min_principal_amount; 
        $this->default_loan_principal_amount = $this->loan_product->def_principal_amount; 
        $this->maximum_principal_amount = $this->loan_product->max_principal_amount; 

        $this->minimum_loan_interest = $this->loan_product; 
        $this->default_loan_interest = $this->loan_product;
        $this->maximum_loan_interest = $this->loan_product;
        
        $this->minimum_loan_duration = $this->loan_product;
        $this->default_loan_duration = $this->loan_product->name; 
        $this->maximum_loan_duration = $this->loan_product->name; 

        $this->default_num_of_repayments = $this->loan_product->name; 
        $this->maximum_num_of_repayments = $this->loan_product->name; 
        $this->minimum_num_of_repayments = $this->loan_product->name; 
    }
}

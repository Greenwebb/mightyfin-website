<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use App\Traits\LoanTrait;
use App\Traits\SettingTrait;
use App\Models\LoanAccountPayment;
use App\Models\LoanDecimalPlace;
use App\Models\LoanDisbursedBy;
use App\Models\LoanInterestMethod;
use App\Models\LoanInterestType;
use App\Models\LoanProduct;
use App\Models\LoanRepaymentCycle;
use App\Models\LoanRepaymentOrder;
use App\Models\RepaymentCycle;
use App\Models\RepaymentOrder;
use Illuminate\Support\Facades\Session;
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
        $this->loan_products = $this->get_all_loan_products();


        return view('livewire.dashboard.site-settings.system-item-settings')
        ->layout('layouts.admin');
    }

    // System Setting Delete Functions
    public function deleteLoanProduct($id){
        
        try {
            LoanDisbursedBy::where('loan_product_id', $id)->delete();
            LoanInterestMethod::where('loan_product_id', $id)->delete();
            LoanInterestType::where('loan_product_id', $id)->delete();
            LoanRepaymentCycle::where('loan_product_id', $id)->delete();
            LoanDecimalPlace::where('loan_product_id', $id)->delete();
            LoanAccountPayment::where('loan_product_id', $id)->delete();
            LoanProduct::where('id', $id)->delete();
            Session::flash('success', "Loan product created successfully.");
        } catch (\Throwable $th) {
            Session::flash('success', "Loan product created successfully.");
        }
        
    }
    
}

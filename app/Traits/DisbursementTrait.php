<?php

namespace App\Traits;

use App\Models\DisbursedBy;
use App\Models\Penalty;
use App\Models\RepaymentCycle;
use App\Models\ServiceCharge;

trait DisbursementTrait{


    public function get_all_disbursement_methods(){
        return DisbursedBy::orderBy('created_at', 'desc')->get();
    }
    public function get_all_repayment_cycle(){
        return RepaymentCycle::orderBy('created_at', 'desc')->get();
    }

    public function get_all_penalties(){
        return Penalty::orderBy('created_at', 'desc')->get();
    }

    public function get_all_loan_fees(){
        return ServiceCharge::orderBy('created_at', 'desc')->get();
    }

}
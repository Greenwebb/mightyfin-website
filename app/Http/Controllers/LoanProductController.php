<?php

namespace App\Http\Controllers;

use App\Models\LoanStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoanProductController extends Controller
{
    
    public function updateLoanStatus(Request $request){
        try {
            $data = $request->toArray();
            // Processing
            foreach (($data['processing']) as $key => $value) {
                LoanStatus::updateOrCreate(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'step' => $key + 1,
                    ],
                    [
                        'status_id' => $value,
                        'stage' => 'processing',
                    ]
                );
            }
    
            // Open
            foreach (($data['open']) as $key => $value) {
                LoanStatus::updateOrCreate(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'step' => $key + 1,
                    ],
                    [
                        'status_id' => $value,
                        'stage' => 'open',
                    ]
                );
            }
    
            // Defaulted
            foreach (($data['defaulted']) as $key => $value) {
                LoanStatus::updateOrCreate(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'step' => $key + 1,
                    ],
                    [
                        'status_id' => $value,
                        'stage' => 'defaulted',
                    ]
                );
            }
    
            // Denied
            foreach (($data['denied']) as $key => $value) {
                LoanStatus::updateOrCreate(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'step' => $key + 1,
                    ],
                    [
                        'status_id' => $value,
                        'stage' => 'denied',
                    ]
                );
            }
    
            // Not Taken Up
            foreach (($data['not_taken_up']) as $key => $value) {
                LoanStatus::updateOrCreate(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'step' => $key + 1,
                    ],
                    [
                        'status_id' => $value,
                        'stage' => 'open',
                    ]
                );
            }
            Session::flash('success', "Loan statuses created successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-types']);
        } catch (\Throwable $th) {
            Session::flash('error', "Failed. ". $th->getMessage());
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-types']);
        }
    }
}

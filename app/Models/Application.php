<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'lname',
        'fname',
        'email',
        'phone',
        'gender',
        'type',
        'loan_product_id',
        'repayment_plan',
        'amount',
        'interest',
        'payback_amount',
        
        'glname',
        'gfname',
        'gemail',
        'gphone',
        'g_gender',
        'g_relation',
        'gnrc_no',
        'gdob',
        'gphone2',
        'gphonesp3',
        'gaddress',

        'g2lname',
        'g2fname',
        'g2email',
        'g2phone',
        'g2_gender',
        'g2_relation',

        'nrc_file',
        'tpin_file',
        'business_file',
        'payslip_file',
        'bank_trans_file',
        'bill_file',
        'status',

        'user_id',
        'guest_id',
        'payback_amount',
        'penalty_addition',
        'due_date',
        'can_change',

        'processed_by',
        'approved_by',
        
        'complete',
        'doa',

        'monthly_payments',
        'maximum_deductable',
        'net_pay_blr', //net before loan recovery
        'net_pay_alr', //net pay after loan recovery
        'service_cost' ,
        'cust_type',
        'personal_loan_type',
        'age',
        'is_zambian',
        'nationality',
        'continue',
        'is_assigned'
    ];
    protected $appends = [
        'done_by',
        'confirmed_by'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('withUser', function ($builder) {
            $builder->with('user');
        });
    }

    public function getDoneByAttribute(){
        return User::where('id', $this->processed_by)->first();
    }

    public function getConfirmedByAttribute(){
        // must change to loan
        return User::where('id', $this->processed_by)->first();
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function manual_approvers(){
        return $this->hasMany(LoanManualApprover::class);
    }

    public function loan(){
        return $this->hasOne(Loans::class);
    }
    public function loan_product(){
        return $this->belongsTo(LoanProduct::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function loan_scores()
    {
        return $this->hasMany(LoanScore::class);
    }

    public function approvedLoans(){
        return $this->hasOne(Loans::class);
    }

    // public function approvalAction(){
    //     return $this->hasMany()
    // }

    // public static function payback($principal, $duration){
    //     // 1 month
    //     if( $duration < 2){
    //         return ($principal * 0.2) + $principal;
    //     }

    //     // 2 to 6 months
    //     if( $duration > 1 && $duration < 7 ){
    //         return ($principal * 0.44) + $principal;
    //     } 
        
    //     // 3 months and above
    //     // if( $duration > 3){
    //     //     return ($principal * 1.44) + $principal;
    //     // }
    // }

    // Pending for approval
    public static function currentApplication(){
        return Application::where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')->first();
        // ->where('status', 0)->where('complete', 0)->first();
    }

    // Pending for payback
    public static function activeApplication(){
        return Application::where('user_id', auth()->user()->id)
        ->where('status', 1)->where('complete', 1)->first();
    }

    // About to Deprecate
    public static function payback($principal, $duration, $product_id = null){
        return 0;
    }

    public static function interest_amount($principal, $duration){
        return 0;    
    }

    public static function interest_rate($product_id){
        $loan_product = LoanProduct::where('id', $product_id)->with([
            'disbursed_by.disbursed_by',
            'interest_methods.interest_method', 
            'interest_types.interest_type',
            'loan_accounts.account_payment',
            'loan_status.status',
            'loan_decimal_places'
            ])->first();
            
        if( $loan_product->interest_types->first()->interest_type->first()->name == 'Percentage' ){
            return $loan_product->def_loan_interest.'%';
        }else{
            return 'K '.$loan_product->def_loan_interest;
        }
    }
    

    public static function monthly_installment($amount, $duration){
        try {
            $total_collectable = Application::payback($amount, $duration);
            $total = $total_collectable / $duration;
            return number_format($total, 2, '.', '');
        } catch (\Throwable $th) {
            return 0;
        }
    }

    // COUNTS
    public static function totalLoans(){
        return Application::get()->count();
    }
    public static function totalApprovedLoans(){
        return Application::where('status', 1 )->get()->count();
    }
    public static function totalPendingLoans(){
        return Application::where('status', 0)->where('complete', 1)->get()->count();
    }


    // FUNDS
    public static function totalAmountLoans(){
        //  Total amount for all loans with complete KYC
        return Application::where('complete', 1)->sum('amount');
    }
    public static function totalAmountLoanedOut(){
        //  Total amount for complete and approved loans 
        return Application::where('complete', 1)->where('status', 1)->whereNotNull('due_date')->sum('amount');
    }
    public static function totalAmountPending(){
        // Total amount for complete and under review / pending approval
        return Application::where('complete', 1)->where('status', [0, 2])->sum('amount');
    }


    // ELIGIBILITY
    public static function loan_assemenent_table($loan){
        $basic_pay = $loan->user->basic_pay; // Clear
        $net_pay = $loan->user->net_pay; //Unclear //Net Pay Before Loan Recovery
        $principal = $loan->amount; // Clear
        $interest = $loan->interest; // Clear
        $total_collectable = Application::payback($loan->amount, $loan->repayment_plan); // Clear
        $payment_period = $loan->repayment_plan; // Clear
        $monthly_payment = Application::monthly_installment($loan->amount, $loan->repayment_plan); // Clear
        $maximum_deductable_amount = $net_pay * 0.75; // Clear
        $net_pay_alr = $net_pay * 0.25;; //Net Pay After Loan Recovery //Clear
        
        // if($maximum_deductable_amount > 0){
            $credit_score = $monthly_payment < $maximum_deductable_amount;
        // }else{
        //     $credit_score = false;
        // }

        $data = [
            'borrower' => $loan->user->fname.' '.$loan->user->lname,
            'basic_pay' => $basic_pay, // Clear
            'net_pay_blr' => $net_pay, //Unclear //Net Pay Before Loan Recovery
            'principal' => $principal, // Clear
            'interest' => $payment_period < 2 ? '20%':'44%', // Clear
            'total_collectable' =>  $total_collectable, // Clear
            'payment_period' => $payment_period, // Clear
            'monthly_payment' =>  $monthly_payment, // Clear
            'maximum_deductable_amount' => $maximum_deductable_amount, // Clear
            'net_pay_alr' => $net_pay_alr, //Net Pay After Loan Recovery //Clear
            'dob' => $loan->user->dob,
            'doa' => $loan->created_at->toFormattedDateString(), //Date of Application
            'dop' => '',
            'credit_score' => $credit_score
        ];
        return $data;
    }
}

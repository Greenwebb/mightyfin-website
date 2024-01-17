<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Application;
use App\Models\LoanManualApprover;
use App\Models\User;
use App\Traits\EmailTrait;
use App\Traits\LoanTrait;
use App\Traits\WalletTrait;
use Illuminate\Http\Client\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LoanDetailView extends Component
{
    use EmailTrait, WalletTrait, LoanTrait;
    public $loan, $user, $loan_id, $msg, $due_date, $reason;

    public function mount($id){
        /**
            *loan main details
            *Loan owner
            *Loan status timeline
        **/
        $this->loan_id = $id;
    }

    public function render()
    {
        $this->loan = $this->get_loan_details($this->loan_id);
        // dd($this->loan->user->uploads[0]->path);

        if (auth()->user()->hasRole('user')) {
<<<<<<< HEAD
            return view('livewire.dashboard.loans.loan-detail-view')
=======
            // return view('livewire.dashboard.loans.loan-app-hrdetail-view')
            return view('livewire.dashboard.loans.loan-detail-app-view')
>>>>>>> 78738c3278e310c1058878507e5ac1fc0e92f0b6
            ->layout('layouts.dashboard');
        }else{
            return view('livewire.dashboard.loans.loan-detail-view')
            ->layout('layouts.admin');
        }
    }

    public function setLoanID($id){
        $this->loan_id = $id;
    }

    public function confirm($id, $msg){
        $this->loan_id = $id;
        $this->msg = $msg;
    }

    public function clear(){
        $this->loan_id = '';
        $this->msg = '';
    }

    // This method activates the reviewing state
    public function reviewLoan()
    {

        Application::where('id', $this->loan_id)->update(['status' => 2]);
        LoanManualApprover::where('user_id', auth()->id())->update(['is_processing' => 1]);
        // Redirect to other page here
        Redirect::route('loan-details',['id' => $this->loan_id]);
        session()->flash('success', 'Loan successfully set under review!');
        sleep(3);

    }

    // This method is the actual approval process - Recommended
    public function accept($id){
        // DB::beginTransaction();
        try {
            $application_request = Application::find($id);
            // Make the loan
            // $this->make_loan($x, $this->due_date);
            // $this->isCompanyEnough($x->amount);

            // Do this - If this officer is the last approver
            // dd($this->final_approver($id)['status']);
            if($this->final_approver($id)['status']){
                $this->approve_final($application_request);
            }else{
                $this->approve_continue($id);
            }
        } catch (\Throwable $th) {
            dd($th);
            // DB::rollback();
            session()->flash('error', 'Oops something failed here, please contact the Administrator.'.$th);
        }
    }

    public function approve_continue($id){
        $this->upvote($id);
    }

    public function approve_final($x){
        if(true){
            $this->upvote($x->id);
            $x->status = 1;
            $x->save();
            // dd($x->email);
            if($x->email != null){
                $mail = [
                    'user_id' => $x->user_id,
                    'application_id' => $x->id,
                    'name' => $x->fname.' '.$x->lname,
                    'loan_type' => $x->type,
                    'phone' => $x->phone,
                    'email' => $x->email,
                    'duration' => $x->repayment_plan,
                    'amount' => $x->amount,
                    'payback' => Application::payback($x->amount, $x->repayment_plan),
                    'type' => 'loan-application',
                    'msg' => 'Your '.$x->type.' loan application request has been successfully accepted'
                ];
                $this->send_loan_accepted_notification($mail);
                // $this->send_loan_feedback_email($mail);

            }
            $this->deposit($x->amount, $x);
            DB::commit();
            session()->flash('success', 'Successfully transfered '.$x->amount.' to '.$x->fname.' '.$x->lname);
        }else{
            session()->flash('warning', 'Insuficient funds in the company account, please update funds.');
        }
    }


    public function stall($id){
        try {
            $x = Application::find($id);
            $x->status = 2;
            $x->save();

            $mail = [
                'user_id' => '',
                'application_id' => $x->id,
                'name' => $x->fname.' '.$x->lname,
                'loan_type' => $x->type,
                'phone' => $x->phone,
                'email' => $x->email,
                'duration' => $x->repayment_plan,
                'amount' => $x->amount,
                'payback' => Application::payback($x->amount, $x->repayment_plan),
                'type' => 'loan-application',
                'msg' => 'Your '.$x->type.' loan application is under review'
            ];
            $this->send_loan_feedback_email($mail);
            $this->render();
            session()->flash('info', 'Application is under review.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }


    public function reverse($id){
        try {
            $x = Application::find($id);
            $x->status = 3;
            $x->save();

            $mail = [
                'user_id' => '',
                'application_id' => $x->id,
                'name' => $x->fname.' '.$x->lname,
                'loan_type' => $x->type,
                'phone' => $x->phone,
                'email' => $x->email,
                'duration' => $x->repayment_plan,
                'amount' => $x->amount,
                'payback' => Application::payback($x->amount, $x->repayment_plan),
                'type' => 'loan-application',
                'msg' => 'Your '.$x->type.' loan application request has been rejected'
            ];
            $this->withdraw($x->amount, $x);
            $this->send_loan_feedback_email($mail);
            session()->flash('success', 'Loan has been rejected');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }

    public function rejectOnly(){

        try {
            $x = Application::find($this->loan_id);
            $x->status = 3;
            $x->save();


            $mail = [
                'user_id' => $x->user_id,
                'application_id' => $x->id,
                'name' => $x->fname.' '.$x->lname,
                'estimate' => 500,
                'loan_type' => $x->type,
                'phone' => $x->phone,
                'email' => $x->email,
                'duration' => $x->repayment_plan,
                'amount' => $x->amount,
                'payback' => Application::payback($x->amount, $x->repayment_plan),
                'type' => 'loan-application',
                'msg' => 'Your '.$x->type.' loan application request. After careful consideration, we regret to inform you that your loan request has been declined. REASON: '.$this->reason
            ];

            $this->send_loan_declined_notification($mail);
            Redirect::route('loan-details',['id' => $this->loan_id]);
            session()->flash('success', 'Loan has been rejected');

        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }


}

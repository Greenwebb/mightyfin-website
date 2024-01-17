<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use SettingTrait, LoanTrait;
    public function __get_approvers(){
        return $this->active_loan_approvers();
    }
    public function __set_approvers(Request $request){
        $set = $this->update_auto_loan_approvers($request->toArray());
        if($set){
            return response()->json(['status'=>200]);
        }else{
            dd('failed');
        }
    }

    public function __get_loan_products(){
        $data = $this->get_all_loan_products();
        return response()->json($data);
    }

    public function __get_loan_details($id){
        $data = $this->get_loan_product($id);
        return response()->json($data);
    }


}

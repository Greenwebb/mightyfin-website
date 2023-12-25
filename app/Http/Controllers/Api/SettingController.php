<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\SettingTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use SettingTrait;
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
}

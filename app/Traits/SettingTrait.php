<?php

namespace App\Traits;

use App\Models\LoanApprover;
use App\Models\SystemSetting;
use App\Models\User;

trait SettingTrait{

    public function current_configs($name){
        // dd($name);
        return $this->current_conf = SystemSetting::with('auto_approvers')->where('name', $name)->first();
    }
    public function active_loan_approvers(){
        return User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'user');
        })
        ->orderBy('fname', 'asc')
        ->get();
        
    }

    public function update_auto_loan_approvers(array $data){
        try {
            // Update or create SystemSetting based on the 'name' field
            $config = SystemSetting::updateOrCreate(
                [
                    'name' => $data['setting'],
                ],
                [
                    'name' => $data['setting'], // Update other fields if necessary
                    'value' => $data['process_type'],
                    'type' => $data['process_type'],
                    'status' => 1,
                    'active' => 1,
                    'count' => count($data['approver']),
                    'user_id' => auth()->user()->id,
                ]
            );

            // Update or create LoanApprovers based on the 'setting_id' field
            if(isset($data['approver']) && $data['process_type'] == 'auto'){
                foreach ($data['approver'] as $key => $user_id) {
                    LoanApprover::updateOrCreate(
                        [
                            'setting_id' => $config->id,
                            'user_id' => $user_id,
                        ],
                        [
                            'setting_id' => $config->id,
                            'priority' => $key + 1,
                            'status' => 1,
                        ]
                    );
                }
            }
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

}
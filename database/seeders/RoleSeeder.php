<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        // $role3 = Role::create(['name' => 'officer']);
        // $role4 = Role::create(['name' => 'employee']);
        
        // Company Wallet
        Permission::create(['name' => 'view company wallet','group'=>'','permission'=>'', 'description' => 'View company wallet'])->syncRoles([$role1]);
        
        // Clientele
        Permission::create(['name' => 'view clientele','group'=>'customer','permission'=>'Read', 'description' => 'View a customer'])->syncRoles([$role1]);
        Permission::create(['name' => 'edit clientele','group'=>'customer','permission'=>'Edit', 'description' => 'Edit a customer'])->syncRoles([$role1]);
        Permission::create(['name' => 'delete clientele','group'=>'customer','permission'=>'Delete', 'description' => 'Delete a customer'])->syncRoles([$role1]);
        Permission::create(['name' => 'create clientele','group'=>'customer','permission'=>'Create', 'description' => 'Create a customer'])->syncRoles([$role1]);
        
        // Operation Module
        Permission::create(['name' => 'view operations','group'=>'operations','permission'=>'Read', 'description' => 'View Employees'])->syncRoles([$role1]);

        // Employees
        Permission::create(['name' => 'view employees','group'=>'employee','permission'=>'Read', 'description' => 'View Employees'])->syncRoles([$role1]);
        Permission::create(['name' => 'edit employee','group'=>'employee','permission'=>'Edit', 'description' => 'Update Employees'])->syncRoles([$role1]);
        Permission::create(['name' => 'delete employee','group'=>'employee','permission'=>'Delete', 'description' => 'Delete Employees'])->syncRoles([$role1]);
        Permission::create(['name' => 'create employee','group'=>'employee','permission'=>'Create', 'description' => 'Add/create Employees'])->syncRoles([$role1]);
        
        // Reports
        Permission::create(['name' => 'view reports','group'=>'reports','permission'=>'Read', 'description' => 'View Reports Module'])->syncRoles([$role1]);
        Permission::create(['name' => 'view loan reports','group'=>'reports','permission'=>'Loan Reports ', 'description' => 'View Loan Reports'])->syncRoles([$role1]);
        
        // Accounting
        Permission::create(['name' => 'view accounting','group'=>'accounts','permission'=>'Read', 'description' => 'View Accounting Module'])->syncRoles([$role1]);
        Permission::create(['name' => 'view transactions','group'=>'accounts','permission'=>'Read Transactions', 'description' => 'View Payment Transactions'])->syncRoles([$role1]);
        Permission::create(['name' => 'manage funds','group'=>'accounts','permission'=>'Manage Funds', 'description' => 'Manage Company Wallet Funds'])->syncRoles([$role1]);
        
        // Repayments
        Permission::create(['name' => 'view repayments','group'=>'repayments','permission'=>'Read', 'description' => 'view repayments module'])->syncRoles([$role1]);
        Permission::create(['name' => 'view pending repayments','group'=>'repayments','permission'=>'Read Pending', 'description' => 'view repayments pending'])->syncRoles([$role1]);
        Permission::create(['name' => 'view missed repayments','group'=>'repayments','permission'=>'Read Missed', 'description' => 'view repayments missed'])->syncRoles([$role1]);
        Permission::create(['name' => 'view past maturity','group'=>'repayments','permission'=>'Read Past Maturity', 'description' => 'view past maturity date loans'])->syncRoles([$role1]);
        // Permission::create(['name' => 'view loan relatives','group'=>'','permission'=>'', 'description' => 'view loan Guarantors, Missed Repayments and Past Maturity Date'])->syncRoles([$role1]);

        // Dashboard Page
        Permission::create(['name' => 'view dashboard','group'=>'','permission'=>'', 'description' => 'See the dashboard'])->syncRoles([$role1]);
        Permission::create(['name' => 'view company financial statistics','group'=>'','permission'=>'', 'description' => 'View company financial statistics'])->syncRoles([$role1]);
        Permission::create(['name' => 'help-desk and support','group'=>'','permission'=>'', 'description' => 'Help-desk and support'])->syncRoles([$role1]);
        Permission::create(['name' => 'view kyc','group'=>'','permission'=>'', 'description' => 'view financial overview'])->syncRoles([$role2]);
        Permission::create(['name' => 'company overview dashboard','group'=>'','permission'=>'', 'description' => 'View company overview dashboard'])->syncRoles([$role1]);
        Permission::create(['name' => 'view all loan requests','group'=>'','permission'=>'', 'description' => 'View all loan requests'])->syncRoles([$role1]);

        // User Page
        Permission::create(['name' => 'see the list of users','group'=>'','permission'=>'', 'description'=> 'Sees all the list of users registered in the system'])->syncRoles([$role1]);
        Permission::create(['name' => 'create a user','group'=>'','permission'=>'', 'description'=> 'Creates a new user'])->syncRoles([$role1]);
        Permission::create(['name' => 'edit a user','group'=>'','permission'=>'', 'description'=> 'Updates a user'])->syncRoles([$role1]);
        
        // Roles Page
        Permission::create(['name' => 'view user roles','group'=>'','permission'=>'', 'description' => 'View user roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'add user roles','group'=>'','permission'=>'', 'description' => 'Add new roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'edit user roles','group'=>'','permission'=>'', 'description' => 'Edit user roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'delete user roles','group'=>'','permission'=>'', 'description' => 'Deletes user roles'])->syncRoles([$role1]);

        // Setting Page
        Permission::create(['name' => 'view system settings','group'=>'','permission'=>'', 'description' => 'View system settings'])->syncRoles([$role1]);
        Permission::create(['name' => 'change system settings','group'=>'','permission'=>'', 'description' => 'Change or update system settings'])->syncRoles([$role1]);

        // Loans Page --Done
        Permission::create(['name' => 'view loans','group'=>'loan','permission'=>'Read All', 'description' => 'View all loans'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'review loan','group'=>'loan','permission'=>'Review', 'description' => 'Review, accept or reject loan requests'])->syncRoles([$role1]);
        Permission::create(['name' => 'view pending','group'=>'loan','permission'=>'Read Pending', 'description' => 'View pending loan requests'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'assign loan','group'=>'loan','permission'=>'Assign', 'description' => 'Assign pending loan requests'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'view closed','group'=>'loan','permission'=>'Read Closed Loans', 'description' => 'View closed loan requests'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'update loans','group'=>'loan','permission'=>'Update', 'description' => 'Update loan management'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'create loans','group'=>'loan','permission'=>'Create', 'description' => 'Create loan management'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'delete loans','group'=>'loan','permission'=>'Delete', 'description' => 'Delete loan management'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'view loan history','group'=>'loan','permission'=>'', 'description' => 'View loan management'])->syncRoles([$role1]);
        
                    // --deplicated --
        // Permission::create(['name' => 'view loan requests','group'=>'loan','permission'=>'View Loan Requests', 'description' => 'View loan requests'])->syncRoles([$role1,$role2]);
        // Permission::create(['name' => 'accept and reject loan requests','group'=>'loan','permission'=>'Review', 'description' => 'Review, accept or reject loan requests'])->syncRoles([$role1]);

        // Loan Rates
        Permission::create(['name' => 'view loan rates','group'=>'loan rates','permission'=>'', 'description' => 'View loan management'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'view loan calculator','group'=>'calculator','permission'=>'', 'description' => 'View loan management'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'make payments','group'=>'','permission'=>'', 'description' => 'Make payments to repay loans'])->syncRoles([$role2]);
        Permission::create(['name' => 'withdraw funds','group'=>'','permission'=>'', 'description' => 'Withdraw loan funds'])->syncRoles([$role2]);
        
        
        // Payments
        Permission::create(['name' => 'transfer funds to customers','group'=>'','permission'=>'', 'description' => 'Transfer funds to customers'])->syncRoles([$role1]);
        Permission::create(['name' => 'send payment remainders to customers','group'=>'','permission'=>'', 'description' => 'Send payment remainders to customers'])->syncRoles([$role1]);

    }
}

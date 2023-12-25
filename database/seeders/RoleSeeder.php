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
        $role3 = Role::create(['name' => 'officer']);
        $role4 = Role::create(['name' => 'employee']);
        
        

        Permission::create(['name' => 'view company wallet','group'=>'','permission'=>'', 'description' => 'View company wallet'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'view clientele','group'=>'','permission'=>'', 'description' => 'View clientele'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'view employees','group'=>'','permission'=>'', 'description' => 'View Employees'])->syncRoles([$role1]);
        Permission::create(['name' => 'view reports','group'=>'','permission'=>'', 'description' => 'View Reports'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'view accounting','group'=>'','permission'=>'', 'description' => 'View Accounting'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'view loan relatives','group'=>'','permission'=>'', 'description' => 'view loan Guarantors, Missed Repayments and Past Maturity Date'])->syncRoles([$role1,$role4]);

        // Dashboard Page
        Permission::create(['name' => 'view dashboard','group'=>'','permission'=>'', 'description' => 'See the dashboard'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'view company financial statistics','group'=>'','permission'=>'', 'description' => 'View company financial statistics'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'help-desk and support','group'=>'','permission'=>'', 'description' => 'Help-desk and support'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'view kyc','group'=>'','permission'=>'', 'description' => 'view financial overview'])->syncRoles([$role2,$role4]);
        Permission::create(['name' => 'company overview dashboard','group'=>'','permission'=>'', 'description' => 'View company overview dashboard'])->syncRoles([$role1, $role4]);
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

        // Loans Page
        Permission::create(['name' => 'view loans','group'=>'loan','permission'=>'Read', 'description' => 'View loan management'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name' => 'update loans','group'=>'loan','permission'=>'Update', 'description' => 'Update loan management'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name' => 'create loans','group'=>'loan','permission'=>'Create', 'description' => 'Create loan management'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name' => 'delete loans','group'=>'loan','permission'=>'Delete', 'description' => 'Delete loan management'])->syncRoles([$role1,$role2,$role4]);
        Permission::create(['name' => 'view loan history','group'=>'loan','permission'=>'', 'description' => 'View loan management'])->syncRoles([$role1]);
        Permission::create(['name' => 'accept and reject loan requests','group'=>'loan','permission'=>'Review', 'description' => 'Review, accept or reject loan requests'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'view loan requests','group'=>'loan','permission'=>'View Loan Requests', 'description' => 'View loan requests'])->syncRoles([$role1,$role2,$role4]);

        // Loan Rates
        Permission::create(['name' => 'view loan rates','group'=>'loan rates','permission'=>'', 'description' => 'View loan management'])->syncRoles([$role1, $role4]);
        
        Permission::create(['name' => 'view loan calculator','group'=>'calculator','permission'=>'', 'description' => 'View loan management'])->syncRoles([$role1,$role2, $role4]);
        Permission::create(['name' => 'make payments','group'=>'','permission'=>'', 'description' => 'Make payments to repay loans'])->syncRoles([$role2,$role4]);
        Permission::create(['name' => 'withdraw funds','group'=>'','permission'=>'', 'description' => 'Withdraw loan funds'])->syncRoles([$role2]);
        
        
        // Payments
        Permission::create(['name' => 'transfer funds to customers','group'=>'','permission'=>'', 'description' => 'Transfer funds to customers'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'send payment remainders to customers','group'=>'','permission'=>'', 'description' => 'Send payment remainders to customers'])->syncRoles([$role1,$role4]);

    }
}

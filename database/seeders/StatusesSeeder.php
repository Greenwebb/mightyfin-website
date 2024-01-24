<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Verification'
        ]);
        Status::create([
            'name' => 'Approval'
        ]);
        Status::create([
            'name' => 'Disbursements'
        ]);
    }
}

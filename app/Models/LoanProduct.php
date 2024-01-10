<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'release_date',
        'min_principal_amount',
        'def_principal_amount',
        'max_principal_amount',

        'min_loan_interest',
        'def_loan_interest',
        'max_loan_interest',

        'min_num_of_repayments',
        'def_num_of_repayments',
        'max_num_of_repayments',
    ];

    public function disbursed_by(){
        return $this->hasMany(LoanDisbursedBy::class);
    }
}

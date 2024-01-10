<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disbursed_bies', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('loan_product_id')->nullable();
            $table->unsignedBigInteger('disbursed_by_id')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disbursed_bies');
    }
};

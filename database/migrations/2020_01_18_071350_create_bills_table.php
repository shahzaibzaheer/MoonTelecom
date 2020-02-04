<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *v
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('billingMonth');
            $table->bigInteger('connection_id');
            $table->integer('bandwidth');
            $table->integer('due');
            $table->integer('billAmount');
            $table->integer('amountPaid')->default(0);
            $table->integer('status')->default(0);  // 0 not recovered, 1 not paid (if user pay 0) , 2 paid
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
        Schema::dropIfExists('bills');
    }
}

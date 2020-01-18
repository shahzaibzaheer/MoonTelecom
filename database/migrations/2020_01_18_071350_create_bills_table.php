<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('connection_id');
            $table->bigInteger('user_id');
            $table->integer('amount_paid');
            $table->boolean('isPaid')->default(false);
            $table->timestamp('recovered_at');
            $table->integer('bandwidth');
            $table->integer('monthBill');
            $table->integer('due');
            $table->string('comments');
            $table->timestamp('month')->nullable();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('fathername')->nullable();
            $table->string('cnic')->nullable();
            $table->string('phone')->nullable();    
            $table->string('email')->nullable();
            $table->bigInteger('village_id');
            $table->string('installationAddress');
            $table->string('billingAddress')->nullable();
//            $table->integer('installationFees');
            $table->bigInteger('package_id');
            $table->string('isBlocked')->default(false); // also add state new, active, block ???
            $table->bigInteger('user_id'); // kiss user ny create kiya
            $table->bigInteger('current_bill_id')->nullable();
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
        Schema::dropIfExists('connections');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('carrier_post_id');
            $table->unsignedBigInteger('requested_by');
            $table->string('received_by');
            $table->string('received_by_mobile_number');
            $table->integer('payable_amount');
            $table->string('status');
            $table->string('passphrase');
            $table->text('description');
            $table->float('weight');
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
        Schema::dropIfExists('carries');
    }
}

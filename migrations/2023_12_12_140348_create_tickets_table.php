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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('id');
            $table ->bigInteger('cust_id') ->unsigned();
            $table->string('serial_number')->unique();
            $table->enum('ticket_type', ['adult', 'child','baby']);
            $table->integer('quantity');
            $table->dateTime('purchase_date');
            $table->dateTime('validity_start');
            $table->dateTime('validity_end');
            $table->enum('status', ['valid','expired']);
            $table->integer('price');
            $table->enum('payment_status', ['paid','unpaid']);
            $table->foreign('cust_id')->references('id')->on('visitor_profiles')->onDelete('cascade');
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
        Schema::dropIfExists('tickets');
    }
};

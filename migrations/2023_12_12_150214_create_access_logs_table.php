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
        Schema::create('access_logs', function (Blueprint $table) {
            $table->id('id');
            $table ->bigInteger('cust_id') ->unsigned();
            $table ->bigInteger('ticket_id') ->unsigned();
            $table->enum('entry_status', ['granted', 'denied']);
            $table->dateTime('entry_timestamps');
            $table->foreign('cust_id')->references('id')->on('visitor_profiles')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
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
        Schema::dropIfExists('access_logs');
    }
};

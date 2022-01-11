<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('srv_id')->unsigned();
            $table->integer('bkg_id')->unsigned();
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('srv_id')->references('id')->on('services')
            ->onDelete('cascade');

            $table->foreign('bkg_id')->references('id')->on('bookings')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_services');
    }
}

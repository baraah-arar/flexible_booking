<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add payment plane, date must be datetime
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plc_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('status');
            $table->text('payment_plan');
            $table->decimal('cost', 15, 2);
            $table->timestamps();

            $table->foreign('plc_id')->references('id')->on('places')
            ->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('user_profiles')
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
        Schema::dropIfExists('bookings');
    }
}

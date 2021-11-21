<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->increments('ass_id');
            $table->integer('user_id')->unsigned();
            $table->integer('bkg_id')->unsigned();
            $table->integer('value');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('user_profiles')
            ->onDelete('cascade');

            $table->foreign('bkg_id')->references('bkg_id')->on('bookings')
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
        Schema::dropIfExists('assessments');
    }
}

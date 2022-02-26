<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // change datatype for price to decimal(15,2)
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->unique();
            $table->text('plc_type');
            $table->text('status');
            $table->decimal('price', 15, 2);
            $table->integer('capacity');
            $table->longText('description');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('places');
    }
}

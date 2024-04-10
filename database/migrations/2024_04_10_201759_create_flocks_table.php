<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('number_of_chickens');
            $table->string('flock_purpose');
            $table->string('acquisition_type');
            $table->date('date_of_acquisition');
            $table->text('additional_notes')->nullable();
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
        Schema::dropIfExists('flocks');
    }
}

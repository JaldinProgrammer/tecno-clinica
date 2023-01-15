<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('description');
            $table->time('time');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('reservation_id')->constrained('reservations');
            $table->unsignedBigInteger('diagnostic_id')->nullable();
            $table->foreign('diagnostic_id')->references('id')->on('diagnostics');

//            $table->foreignId('diagnostic_id')->constrained('diagnostics')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('dates');
    }
}

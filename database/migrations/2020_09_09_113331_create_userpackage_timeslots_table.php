<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserpackageTimeslotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userpackage_timeslots', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_package_id')->unsigned();
            $table->date('slotDate');
            $table->time('slotStart', 0);
            $table->time('slotEnd', 0); 
            $table->foreign('user_package_id')->references('id')->on('user_package')->constrained()->onDelete('cascade');
            $table->tinyinteger('status')->default(1)->comment('0 = Block ; 1 = Active'); 
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
        Schema::dropIfExists('userpackage_timeslots');
    }
}

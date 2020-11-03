<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserassignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userassignment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('librarie_id')->unsigned();
            $table->bigInteger('user_virtualmeaning_id')->unsigned();
            $table->foreign('librarie_id')->references('id')->on('libraries')->constrained()->onDelete('cascade');
            $table->foreign('user_virtualmeaning_id')->references('id')->on('user_virtualmeaning')->constrained()->onDelete('cascade');
            $table->tinyinteger('assign_type')->default(1)->comment('0 = video ; 1 = tasks');  
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
        Schema::dropIfExists('userassignment');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLibrarieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_librarie', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('librarie_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('librarie_id')->references('id')->on('libraries')->constrained()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('user_librarie');
    }
}

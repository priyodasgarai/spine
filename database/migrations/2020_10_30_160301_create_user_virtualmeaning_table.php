<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVirtualmeaningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_virtualmeaning', function (Blueprint $table) {
            $table->id();            
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('virtualmeaning_id')->unsigned();
            $table->date('slotDate');
            $table->tinyinteger('status')->default(1)->comment('0 = Block ; 1 = Active'); 
            $table->timestamps();
            $table->foreign('virtualmeaning_id')->references('id')->on('virtualmeanings')->constrained()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_virtualmeaning');
    }
}

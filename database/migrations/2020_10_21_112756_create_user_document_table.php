<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_document', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->tinyinteger('file_type')->default(0)->comment('1 = video ; 2 = document');   
            $table->bigInteger('user_id')->unsigned();            
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
        Schema::dropIfExists('user_document');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_address', function (Blueprint $table) {
            $table->id();            
            $table->bigInteger('user_id')->unsigned();              
            $table->tinyinteger('address_type')->default(0)->comment('1 = Shipping  ; 2 = Billing '); 
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('phone_number');  
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
        Schema::dropIfExists('user_address');
    }
}

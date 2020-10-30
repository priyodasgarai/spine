<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualmeaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtualmeanings', function (Blueprint $table) {
            $table->id();
            $table->string('vm_name');            
            $table->text('description')->nullable();  
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
        Schema::dropIfExists('virtualmeanings');
    }
}

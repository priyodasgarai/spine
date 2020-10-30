<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->string('pricing_name');            
            $table->text('description')->nullable();          
            $table->float('price');    
            $table->tinyinteger('payment_schedule')->default(0)->comment('0 = FREE; 1 = Annual Payments; 2 = Monthly Payments; 3 = Quarterly Payments; 4 = Half-yearly Payments; 5 = Weekly Payments'); 
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
        Schema::dropIfExists('pricings');
    }
}

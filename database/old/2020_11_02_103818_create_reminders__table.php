<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders_', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();     
            $table->bigInteger('admin_id')->unsigned();      
            $table->string('titel');
            $table->text('description');
            $table->tinyinteger('post_by')->default(0)->comment('0 = user ; 1 = admin ;');
            $table->tinyinteger('type')->default(1)->comment('0 = reminder ; 1 = note ; 2 = task');
            $table->tinyinteger('status')->default(1)->comment('0 = Block ; 1 = Active'); 
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('reminders_');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserassignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voidScore
     */
    public function up()
    {
        Schema::create('userassignment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('librarie_id')->unsigned()->nullable();
            $table->foreign('librarie_id')->references('id')->on('libraries')->constrained()->onDelete('cascade');
            
            $table->bigInteger('user_document_id')->unsigned()->nullable();
            $table->foreign('user_document_id')->references('id')->on('user_document')->constrained()->onDelete('cascade');
             
            $table->bigInteger('task_id')->unsigned()->nullable();
            $table->foreign('task_id')->references('id')->on('tasks')->constrained()->onDelete('cascade');
            
            $table->bigInteger('questionnaire_id')->unsigned()->nullable();
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires')->constrained()->onDelete('cascade');
            
            $table->bigInteger('user_virtual_id')->unsigned();
             $table->foreign('user_virtual_id')->references('id')->on('user_virtualmeaning')->constrained()->onDelete('cascade');
           
            $table->tinyinteger('assign_type')->default(1)->comment('0 = none ; 1 = Spine Education Score; 2 = SymptomControl Score; 3 = Spine Verticality Score; 4 = Spine Shape Score');  
            $table->tinyinteger('status')->default(1)->comment('0 = Block ; 1 = Active'); 
            
            $table->Integer('score')->default(0)->unsigned();
           
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

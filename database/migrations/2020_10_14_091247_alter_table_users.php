<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->string('address')->nullable()->default(null);
        $table->string('city')->nullable()->default(null);
        $table->string('UT')->nullable()->default(null);
        $table->string('contact_number_1', 15)->nullable()->default(null);
        $table->string('contact_number_2', 15)->nullable()->default(null);
        $table->set('gender', ['NA','male', 'female', 'transgender'])->default('NA');
        $table->date('date_of_birth')->nullable()->default(null);
        $table->string('RecNo', 50)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('address');
        $table->dropColumn('city');
        $table->dropColumn('UT');
        $table->dropColumn('contact_number_1');
        $table->dropColumn('contact_number_2');
        $table->dropColumn('gender');
        $table->dropColumn('date_of_birth');       
        
    });
    }
}

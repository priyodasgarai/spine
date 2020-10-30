<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsNewenrollmentsAndIsPendingAndIsInactiveToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyinteger('is_newenrollments')->default(1)->comment('0 = old ; 1 = new'); 
            $table->tinyinteger('is_pending')->default(1)->comment('0 = Pending ; 1 = Not Pending'); 
            $table->tinyinteger('is_inactive')->default(1)->comment('0 = inactive ; 1 = active'); 
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
             $table->dropColumn(['is_newenrollments', 'is_pending', 'is_inactive']);
        });
    }
}

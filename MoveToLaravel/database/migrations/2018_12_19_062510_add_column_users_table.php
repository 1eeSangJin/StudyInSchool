<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        schema::table('users', function(Blueprint $table){
            $table->string('userId',255)->unique()->nullable();
            $table->string('userNick',255)->unique()->nullable();
            $table->char('sex',60)->nullable();
            $table->char('userPhone', 50)->nullable();
            $table->integer('affNum')->nullable();
            $table->foreign('affNum')->references('affNum')->on('affiliations');
            $table->string('confirm_code', 60)->nullable();
            $table->boolean('activated')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        schema::dropIfExists('users', function(Blueprint $table){
            $table->dropColumn('userId');
            $table->dropColumn('userNick');
            $table->dropColumn('sex');
            $table->dropColumn('userPhone');
            $table->dropColumn('affNum');
            $table->dropColumn('confirm_code');
            $table->dropColumn('activated');
        });
    }
}

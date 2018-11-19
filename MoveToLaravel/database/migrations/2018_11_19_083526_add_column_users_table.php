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
            $table->string('userId',255)->unique();
            $table->string('userNick',255)->unique();
            $table->char('sex',60);
            $table->char('userPhone', 50);
            $table->integer('affNum');
            $table->foreign('affNum')->references('affNum')->on('affiliations');
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
    }
}

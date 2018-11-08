<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id',50)->primary('id');
            $table->string('userPw', 255);
            $table->char('userNick', 50)->unique()->default('Guest');
            $table->char('userName', 50);
            $table->char('sex', 50);
            $table->char('userPhone', 50);
            $table->integer('affNum');
            $table->foreign('affNum')->references('affNum')->on('affiliation');
        });
    }

    /**p
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

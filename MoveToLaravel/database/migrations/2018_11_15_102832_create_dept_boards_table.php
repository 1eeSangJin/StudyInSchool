<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeptBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dept_boards', function (Blueprint $table) {
            $table->integer('affNum');
            $table->foreign('affNum')->references('affNum')->on('affiliation');
            $table->increments('id');
            $table->char('userNick');
            $table->string('title');
            $table->string('content');
            $table->timestamps();
            $table->integer('hits');
            $table->integer('recommend');
            $table->string('affName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dept_boards');
    }
}

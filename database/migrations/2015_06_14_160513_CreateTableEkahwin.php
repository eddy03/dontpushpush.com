<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEkahwin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekhawins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('emel', 200);
            $table->tinyInteger('majlis');
            $table->string('ip', 50);
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
        Schema::drop('ekhawin');
    }
}

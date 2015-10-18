<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('images', 400);
            $table->string('subject', 500);
            $table->string('url', 200);
            $table->text('snippet');
            $table->text('filename', 300);
            $table->boolean('is_publish');
            $table->dateTime('publish_at');
            $table->integer('total_click')->unsign();
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
        Schema::drop('articles');
    }
}

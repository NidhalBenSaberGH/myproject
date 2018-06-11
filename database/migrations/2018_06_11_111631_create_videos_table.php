<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('video_id')->unique()->index();
            $table->string('title');
            $table->string('channel_title');
            $table->integer('category_id');
            $table->text('tags');
            $table->integer('views');
            $table->integer('likes');
            $table->integer('dislikes');
            $table->integer('comment_total');
            $table->string('thumbnail_link');
            $table->string('date');

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
        Schema::dropIfExists('videos');
    }
}

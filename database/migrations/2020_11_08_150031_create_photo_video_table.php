<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('url', 200)->nullable(false);
            $table->timestamps();
        });

        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('url', 200)->nullable(false);
            $table->timestamps();
        });

        Schema::create('image_post', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('image_id');

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('image_id')->references('id')->on('images');
        });

        Schema::create('post_video', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('video_id');

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('video_id')->references('id')->on('videos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_post');
        Schema::dropIfExists('post_video');
        Schema::dropIfExists('images');
        Schema::dropIfExists('videos');
    }
}

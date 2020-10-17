<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddingPictureUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('banner_picture')->nullable();
            $table->string('profile_picture')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_picture')->nullable();
            $table->string('banner_picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['banner_picture', 'profile_picture']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['banner_picture', 'profile_picture']);
        });
    }
}

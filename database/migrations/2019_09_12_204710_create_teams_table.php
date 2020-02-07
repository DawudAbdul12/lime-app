<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
           
            $table->bigIncrements('id');
            $table->string('full_name')->nullable();
            $table->string('position')->nullable();
            $table->longText('bio')->nullable();
            $table->mediumText('profile_pic')->nullable();
            $table->string('email')->nullable();
            $table->mediumText('linkedin')->nullable();
            $table->mediumText('fb')->nullable();
            $table->mediumText('twitter')->nullable();
            $table->mediumText('ig')->nullable();
            $table->mediumText('tag')->nullable();
            $table->string('visibility')->nullable();
            $table->timestamp('publish');
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
        Schema::dropIfExists('teams');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHatsuwasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hatsuwas_tags', function (Blueprint $table) {
            $table->increments('id');
            // $table->timestamps();
            $table->unsignedInteger('hatsuwa_id'); //この行を追加
            $table->unsignedInteger('tag_id'); //この行を追加
            // $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade'); //この行を追加
            // $table->foreign('hatsuwas_id')->references('id')->on('hatsuwas')->onDelete('cascade'); //この行を追加
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hatsuwas_tags');
    }
}

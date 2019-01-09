<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->char('title', 100);
            $table->boolean('status');
            $table->integer('position')->unsigned();
            $table->boolean('use_in_main_menu');
            $table->char('url', 100)->unique();
            $table->char('meta_title', 100);
            $table->string('meta_description', 500);
            $table->string('meta_keywords', 500);
            $table->longText('page_body');
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
        Schema::dropIfExists('pages');
    }
}

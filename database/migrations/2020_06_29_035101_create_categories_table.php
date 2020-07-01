<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', '100')->unique();
            $table->string('slug', '100')->unique();
            $table->string('image', '255')->nullable();
            $table->string('meta_title', '255')->nullable();
            $table->string('meta_description', '255')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->integer('prioty')->nullable();
            $table->integer('parent_id')->default(0);
            $table->unsignedInteger('status')->default(0);
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('categories');
    }
}

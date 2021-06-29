<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->foreignId('cat_id')->nullable()->onDelete('cascade')->onUpdate('cascade')->constrained('categories');
      $table->foreignId('author_id')->onUpdate('cascade')->onDelete('cascade')->constrained('users');
      $table->string('title')->unique();
      $table->text('title_slug')->nullable();
      $table->text('body');
      $table->boolean('is_approved')->default('2');
      $table->tinyInteger('views')->default('0');
      $table->tinyInteger('love')->default('0');
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
    Schema::dropIfExists('posts');
  }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('post_comments', function (Blueprint $table) {
      $table->id();
      $table->foreignId('post_id')->nullable()->onUpdate('cascade')->onDelete('cascade')->constrained('posts');
      $table->text('comment')->nullable();
      $table->foreignId('user_id')->nullable()->onUpdate('cascade')->onDelete('cascade')->constrained('users');
      $table->timestamp('date')->useCurrent();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('post_comments');
  }
}

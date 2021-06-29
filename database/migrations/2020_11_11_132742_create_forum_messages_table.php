<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumMessagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('forum_messages', function (Blueprint $table) {
      $table->id();
      $table->string('subject', 255);
      $table->foreignId('topic_id')->nullable()->onDelete('cascade')->onUpdate('cascade')->constrained('forum_topics');
      $table->foreignId('user_id')->nullable()->onUpdate('cascade')->onDelete('cascade')->constrained('users');
      $table->text('body');
      $table->timestamp('date');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('forum_messages');
  }
}

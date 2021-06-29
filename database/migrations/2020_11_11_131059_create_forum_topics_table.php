<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumTopicsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('forum_topics', function (Blueprint $table) {
      $table->id();
      $table->string('subject', 255);
      $table->foreignId('forum_id')->nullable()->onDelete('cascade')->onUpdate('cascade')->constrained('forums');
      $table->foreignId('user_id')->nullable()->onUpdate('cascade')->onDelete('cascade')->constrained('users');
      $table->timestampTz('date', 0);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('forum_topics');
  }
}

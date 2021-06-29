<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('forums', function (Blueprint $table) {
      $table->id();
      $table->foreignId('cat_id')->nullable()->onDelete('cascade')->onUpdate('cascade')->constrained('categories');
      $table->string('name', 100);
      $table->text('description');
      $table->timestampTz('created', 0);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('forums');
  }
}

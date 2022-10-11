<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('dpls', function (Blueprint $table) {
      // $table->id();
      $table->id();
      $table->bigInteger('noDPL')->unique();
      $table->text('discrepancy');
      $table->text('disposition');
      $table->string('drawing');
      $table->integer('creator_id'); // user id = dpl_id
      $table->integer('category_id');
      $table->timestamp('published_at', $precision = 0)->nullable();
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
    Schema::dropIfExists('dpls');
  }
};

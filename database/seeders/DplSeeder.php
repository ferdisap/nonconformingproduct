<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dpl;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class DplSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Dpl::factory(50)->create();
      // Schema::dropIfExists('dpls');
      // Schema::create('dpls', function (Blueprint $table) {
      //   // $table->id();
      //   $table->id();
      //   $table->bigInteger('noDPL')->unique();
      //   $table->text('discrepancy');
      //   $table->text('disposition');
      //   $table->string('drawing');
      //   $table->integer('creator_id'); // user id = dpl_id
      //   $table->integer('category_id');
      //   $table->timestamp('published_at', $precision = 0)->nullable();
      //   $table->timestamps();
      // });
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dpl;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // User::create([
    //   'name' => 'Ferdi Arrahman',
    //   'nik' => 200188,
    //   'username' => 'ferdisap',
    //   'email' => 'ferdisaptoko@gmail.com',
    //   'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
    //   'email_verified_at' => now(),
    //   'remember_token' => Str::random(10),
    // ]);
    // User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);


    // DB::table('dpl_categories')->insert([
    //   'name' => 'Design Error',
    //   'code' => 'DsE'
    // ]);
    // DB::table('dpl_categories')->insert([
    //   'name' => 'Production Error',
    //   'code' => 'PdE'
    // ]);
    // DB::table('dpl_categories')->insert([
    //   'name' => 'Procurement Error',
    //   'code' => 'PcE'
    // ]);
    // Schema::dropIfExists('dpls');
    // Schema::create('dpls', function (Blueprint $table) {
    //   $table->id();
    //   // $table->string('slug')->unique();
    //   // $table->integer('id');
    //   // $table->increments('id');
    //   // $table->string('noDPL')->primary();
    //   $table->bigInteger('noDPL')->unique();
    //   $table->text('discrepancy');
    //   $table->text('disposition');
    //   $table->string('drawing');
    //   $table->integer('creator_id'); // user id = dpl_id
    //   $table->integer('category_id');
    //   $table->timestamp('published_at', $precision = 0)->nullable();
    //   $table->timestamps();
    // });
    Dpl::factory(3000)->create();
  }
}

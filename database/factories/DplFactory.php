<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\dpl>
 */
class DplFactory extends Factory
{
  private function dateTime(){
    $month = random_int(1, 12);
    if($month <= 9) {
      $month = '0' . $month;
    }


    $date = random_int(1,29);
    if($date <= 9) {
      $date = '0' . $date;
    }
    return '2021-' . (string)$month . '-' . (string)$date . ' 14:00:01';
  }

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $data = substr(str_replace('-','',substr(today(),0,10)),2); //20221009 menjadi 221009
    return [
      // 'id' => $this->faker->unique()->numberBetween(0,99999),
      // 'slug' => $this->faker->unique()->lexify(),
      'noDPL' =>  $data . $this->faker->unique()->numberBetween(0,9999),
      // 'noDPL' =>  $this->faker->unique()->lexify(),
      'discrepancy' => $this->faker->paragraph(3),
      'disposition' => $this->faker->paragraph((3)),
      'drawing' => '114ND10004-001',
      'creator_id' => random_int(1,10),
      'category_id' => random_int(1,3),
      'published_at' => $this->dateTime(),
    ];
  }
}

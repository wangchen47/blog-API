<?php

use App\Label;
use App\TechCategory;
use Illuminate\Database\Seeder;

class TechLevelSeeder extends Seeder
{
    protected $techs = [
      ['PHP'],
      ['Angular'],
      ['Node.js'],
      ['Laravel'],
      ['ThinkPHP']
    ];

    protected $labels = [
      ['html'],
      ['php'],
      ['angular'],
      ['js'],
      ['app sore']
    ];

    public function run()
    {
      foreach ($this->techs as $value) {
        factory(TechCategory::class)->create([
          'name' => $value[0],
        ]);
      }

      foreach ($this->labels as $value) {
        factory(Label::class)->create([
          'name' => $value[0],
        ]);
      }
    }

}

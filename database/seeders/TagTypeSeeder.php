<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TagType;

class TagTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  private array $tagTypes = [['dim', 'diminutos'], 
                            ['maj',  'sétima maior'], 
                            ['sus',  'suspensos na segunda ou quarta'], 
                            ['add',  'na segunda ou quarta'], 
                            ['aug',  'aumentados na segunda ou na quarta']
                           ];

  public function run()
  {
    foreach($this->tagTypes as $type){
      TagType::create(['type_name' => $type[0], 'type_description' => $type[1]]);
    }
  }
}

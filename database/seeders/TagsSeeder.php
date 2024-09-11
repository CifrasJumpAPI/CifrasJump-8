<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */


  //cada array é um grupo de marcadores separados por categoria.
  //dim
  protected $dimCli = [
    [1, '°'    , '|_d000'],
    [1, 'º'    , '|_d001'],
    [1, 'dim'  , '|_d002']
  ];                        

  //maj
  protected $majCli = [
    [2, 'Maj7' , '|_m000'], 
    [2, 'maj7' , '|_m001'],
    [2, '7M'   , '|_m002']
  ];

  //suspenso
  protected $susCli = [
    [3, 'sus2'  , '|_s000'],
    [3, 'sus9'  , '|_s001'],
    [3, 'sus4'  , '|_s002'],
    [3, 'sus11' , '|_s003']
  ];

  //adicionado
  protected $addCli = [
    [4, 'add4'   , '|_a000'],
    [4, 'add11'  , '|_a001'],
    [4, 'add2'   , '|_a002'],
    [4, 'add9'   , '|_a003']
  ];

  //aumentado (adicionado com outra grafia)
  protected $augCli = [
    [5, 'aug2'   , '|_g000'],
    [5, 'aug9'   , '|_g001'],
    [5, 'aug4'   , '|_g002'],
    [5, 'aug11'  , '|_g003']
  ];

  public function joinTags()
  {
    $categoriesList = [];//lista de $category.
    $category = [];//item:array. cada grupo acima.
    $tagList = [];//array de $tag.
    $tag = [];//item:array todos os marcadores mesclados.
    
    $my_class = new TagsSeeder();
    $categoriesList = get_class_vars(get_class($my_class));

    foreach($categoriesList as $category){ 
      if(($category != null)&&($category != "")){
        foreach($category as $tag){
          if(($tag != null)&&($tag != "")){
            array_push($tagList, $tag);
          }
        }
      }
    }

    return $tagList;
  }

  public function run()
  {
    $tagList = $this->joinTags();
    foreach($tagList as $tag){
      Tag::create(['id_tagtypes' => $tag[0], 
                        'match'  => $tag[1],
                        'tag'    => $tag[2]
                        ]);
    }
  }
}

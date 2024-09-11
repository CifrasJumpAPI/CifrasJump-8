<?php

namespace App\Http\Controllers\Aplic\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
  private string $text_input   = '';
  private int    $tuning_input = 0;
  
  
  public function main(Request $request)
  {
    $this->text_input   = (string)$request['text'  ];
    $this->tuning_input =    (int)$request['tuning'];
    return response()->json($this->coordinate());
  }

  public function coordinate()
  {
    return array($this->text_input, $this->tuning_input);
  }
}

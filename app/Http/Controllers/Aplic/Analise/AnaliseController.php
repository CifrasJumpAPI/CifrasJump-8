<?php

namespace App\Http\Controllers\Aplic\Analise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnaliseController extends Controller
{
  static function detectarCifras($text_input)
  {
    echo 'Análise de entrada de texto:'.PHP_EOL;

    $nota = '[ABCDEFG][#b]?';
    $qualidade = '(m|(maj|Maj|MAJ|M|ma|Ma)[279]|[279]M|(add|sus|aug)(2|4|9|11))';
    $extensao = '(\/([2345679]|1[01234])[+-]?)*';//barras literais seguidas de alterações.
    $alteracao = '(([2345679]|1[01234])[+-]?)' . $extensao;//EX: alterações seguidas opcionalmente de $extensao.
    $parenteses = '(\([#b]?([2345679]|1[01234])\))';//alterações dentro de parêntesis.
    $baixo = '\/' . $nota;
    $espaco = '[\t\n\s\r]';//espaço, nova linha e TAB.
    $amem = '(?![^ABCDEFG\t\n\s\r])';//falhou em em Abm7/Gb, Em9.
    $ehCifra = "({$nota}({$qualidade}{$extensao}?)?({$alteracao})?{$parenteses}*({$baixo})?{$espaco})";

    $regex = "{$ehCifra}{$amem}";

    if(!preg_match_all('/'.$regex.'/', $text_input, $matches, PREG_OFFSET_CAPTURE)){
    echo 'SUBJECT NÃO POSSUI ACORDES: [Teste Principal].'.PHP_EOL;
    return false;
    }

    echo PHP_EOL.'Análise encerrada.'.PHP_EOL;
    return $matches[0];//array de acordes aprovados[acorde, índice]
  }
}

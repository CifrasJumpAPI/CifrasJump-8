<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientMainRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules():array
  {
    return [
      'tuning' => ['required', 'numeric', 'integer', 'between:-11,11'],
      'text'   => ['required']
    ];
  }

  public function messages():array
  {
    return[
      'required' => 'O campo :attribute é um campo obrigatório.',
      'tuning.numeric' => 'O campo :attribute deve ser preenchido com um número. E evite a vírgula.',
      'tuning.integer' => 'Um número decimal torna o campo :attribute inválido. Evite vírgula e ponto.',
      'tuning.between' => ['numeric' => 'O campo :attribute deve ter um número entre :min e :max.'],
    ];
  }
}

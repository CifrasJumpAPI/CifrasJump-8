<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagType extends Model
{
  use HasFactory;
  protected $table = 'tagtypes';
  protected $fillable = ['type_name', 'type_description'];

  public function marcador()
  {
    return $this->hasMany(Marcador::class, 'id_tagtypes', 'id');
  }
}

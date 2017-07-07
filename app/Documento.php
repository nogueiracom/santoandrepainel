<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
  protected $fillable = [
    'titulo', 'descricao', 'arquivo', 'user_id'
  ];

  public function user()
  {
      return $this->belongsTo(User::class);
  }
}

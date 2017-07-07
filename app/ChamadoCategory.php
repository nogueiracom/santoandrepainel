<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChamadoCategory extends Model
{
  protected $fillable = ['name'];

  public function chamado()
  {
      return $this->belongsTo(Chamado::class);
  }

}

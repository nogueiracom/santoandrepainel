<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChamadoComentario extends Model
{
  protected $fillable = [
      'ticket_id', 'user_id', 'comment'
  ];

  public function chamado()
  {
      return $this->belongsTo(Chamado::class);
  }

  public function user()
  {
      return $this->belongsTo(User::class);
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
  protected $fillable = [
    'user_id', 'category_id', 'ticket_id', 'title', 'priority', 'message', 'status'
  ];

  public function categoria()
  {
      return $this->hasMany(ChamadoCategory::class);
  }

  public function comentario()
  {
      return $this->hasMany(ChamadoComentario::class);
  }

  public function user()
  {
      return $this->belongsTo(User::class);
  }
}

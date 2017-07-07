<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function chamadocomentario()
    {
        return $this->hasMany(ChamadoComentario::class);
    }

    public function chamado()
    {
        return $this->hasMany(Chamado::class);
    }

    public function documento()
    {
        return $this->hasMany(Documento::class);
    }

  }

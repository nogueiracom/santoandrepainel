<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //Funções que usuario pode cadastrar
    // Utilizando comando (tinker)
    // $cliente = App\Cliente::create(['nome' => 'Cliente2', 'endereco' => 'Rua Dois', 'numero' => '123']);
    // Encontrando usuario: $cliente2 = App\Cliente::findOrFail(2);
    //Modificar  $cliente2->endereco = 'Nome novo';
    //Salvando: $cliente2->save();
    protected $fillable = [
        'nome',
        'endereco',
        'numero'
    ];
}

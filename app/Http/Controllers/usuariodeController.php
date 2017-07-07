<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class usuariodeController extends Controller
{
    public function index()
    {
      // Padrão
      // return view('usuario');

      // Dinamico
      return view ('usuario',[
        'texto' => 'Bem vindo a lista de usuarios',
        'checagem' => false,
        'usuarios' => ['usuario1', 'usuario2', 'usuario3']
      ]);
    }
}

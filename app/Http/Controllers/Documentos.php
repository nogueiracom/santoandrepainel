<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Documento;
use DB;
use Auth;

class Documentos extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $userid = Auth::user()->roles()->first()->id;

      $items = (string)$userid;

      $pages = DB::table('pages')
      ->where('extras->nome_usuario_dois', '=', $items)
      ->get();


      $usuario = DB::table('documentos')
      ->where('user_id', '=', Auth::user()->id)->get();



      return view('documentos.documentos', compact('usuario', 'pages'));
    }
}

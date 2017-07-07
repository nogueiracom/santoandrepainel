<?php

namespace App\Http\Controllers;
use App\Models\ComunicadoArticle;
use Illuminate\Http\Request;
use Auth;
use DB;

class Comunicado extends Controller

{

      public function __construct()
      {
          $this->middleware('auth');
      }

      public function index() {

        $userid = Auth::user()->roles()->first()->id;
        $items = (string)$userid;
        $pages = DB::table('pages')
        ->where('extras->nome_usuario_dois', '=', $items)
        ->get();

        //Comunicado Postagens
        $postagens = DB::table('pages')
        ->where('extras->nome_usuario_dois', '=', $items)
        //Mesclando com a tabela Articles e fazendo integração com category_id
        ->join('comunicado', 'pages.category_id', '=', 'comunicado.category_id')
        ->select('comunicado.*')
        ->paginate(6);

        return view('comunicado.comunicado', compact('pages', 'postagens'));
      }


      public function singlecomunicados($slug) {

        $userid = Auth::user()->roles()->first()->id;
        $items = (string)$userid;
        $pages = DB::table('pages')
        ->where('extras->nome_usuario_dois', '=', $items)
        ->get();

    		//Pegando informações do banco de dados (pages)
    		$comunicado = ComunicadoArticle::where('slug', $slug)->get();



        return view('comunicado.single', compact('pages', 'comunicado'));
      }
}

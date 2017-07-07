<?php

namespace App\Http\Controllers;
use Backpack\PageManager\app\Models\Page;
use Backpack\NewsCRUD\app\Models\Article;
use Backpack\NewsCRUD\app\Models\Tag;
use Backpack\NewsCRUD\app\Models\Category;
use Illuminate\Http\Request;
use App\Documento;
use DB;
use Auth;

class FotosObras extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

      $userid = Auth::user()->roles()->first()->id;
      $items = (string)$userid;
      //Pegando informações do banco de dados (pages)
      $pages = DB::table('pages')
      ->where('extras->nome_usuario_dois', '=', $items)
      ->get();

      //Pegando informações do banco de dados (pages)
      $postagens = DB::table('pages')
      ->where('extras->nome_usuario_dois', '=', $items)
      //Mesclando com a tabela Articles e fazendo integração com category_id
      ->join('articles', 'pages.category_id', '=', 'articles.category_id')
      ->join('article_tag', 'articles.id','=','article_tag.article_id')
      ->join('tags', 'article_tag.tag_id','=','tags.id')
      ->select('articles.*','tags.slug as tags')
      ->get();


      return view('fotosobras.fotosobras', compact('pages','postagens'));
    }


    public function singleposts($slug) {

      $userid = Auth::user()->roles()->first()->id;
  		$items = (string)$userid;
      $pages = DB::table('pages')
      ->where('extras->nome_usuario_dois', '=', $items)
      ->get();
  		//Pegando informações do banco de dados (pages)
  		$fotos = Article::where('slug', $slug)->get();

      return view('fotosobras.galeria', compact('fotos','pages'));
    }

}

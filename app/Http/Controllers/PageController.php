<?php

namespace App\Http\Controllers;
use Backpack\PageManager\app\Models\Page;
use App\Models\Article;
use DB;
use Auth;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::findBySlug($slug);

        if (!$page)
        {
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }


        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();
        $testando = $page->category_id;

        //Checando e pegando informações cadastradas nos posts
        $categoria = DB::table('articles')
        ->where('category_id', '=', $testando)
        ->where('status', '=', 'PUBLISHED')
        ->get();

        //Verificando se está logado, caso sim ira enfiar as informações, se nao redirecionar pra /login
        if (Auth::check()) {
            $useridpage = Auth::user()->roles()->first()->id;
            $items = (string)$useridpage;
            $checkuser = DB::table('pages')
            ->where('extras->nome_usuario_dois', '=', $items)
            ->get();

            if(!$checkuser && $page) {
                abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
            }
        } elseif (!Auth::check()) {
          return redirect('/login');
        }


        return view('pages.'.$page->template, $this->data, compact('categoria', 'checkuser'));
    }

}

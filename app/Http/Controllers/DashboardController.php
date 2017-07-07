<?php

namespace App\Http\Controllers;
use Backpack\CRUD\CrudPanel;
use App\Role;
use Backpack\PageManager\app\Models\Page;
use App\PageTemplates;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Analytics;
use \Spatie\Analytics\Period;


class DashboardController extends Controller {

    public function index(){
      //Pegando ID Roles do Cadastro do usuario
      $userid = Auth::user()->roles()->first()->id;
      //Passando ID para uma string
      $items = (string)$userid;
      $pages = DB::table('pages')
      ->where('extras->nome_usuario_dois', '=', $items)
      ->get();
        //Loop :)
        foreach($pages as $route)
          {
            if ($route->slug) {
              return redirect($route->slug);
            }
          }
        return redirect('/admin');
    }

    public function admindashboard()
    {
        $postagens = DB::table('articles')->count();
        $usuario = DB::table('users')->count();
        // $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(30))->sum('visitors');

        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        return view('vendor.backpack.base.dashboard' , $this->data, compact('postagens','usuario'));
    }
}

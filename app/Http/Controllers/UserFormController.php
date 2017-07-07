<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\User;

use App\DB;
use App\Documento;


class UserFormController extends Controller
{

  public function teste(Request $request)
  {
    $data = User::pluck('name','id');
    return view('users.formulario.cadastro',compact('data'));
  }

  public function index(Request $request)
  {
    $data = User::pluck('name','id');

    return view('users.formulario.cadastro',compact('data'));
  }

  public function cadastro(Request $request) {
    $this->validate($request, [
        'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
    ]);
    $imageName = time().'.'.$request->image->getClientOriginalName();
    $request->image->move(public_path('images'), $imageName);


    $items = new Documento();
    $items->titulo = Input::get('titulo');
    $items->descricao = Input::get('descricao');
    $items->user_id = Input::get('data');
    $items->arquivo = public_path('images') . '/' .time().'.'.$request->file('image')->getClientOriginalName();
    $items->save();



  return back()
  	->with('success','Image Uploaded successfully.')
  	->with('path',$imageName);

    // $items = new Documento();
    // $items->titulo = Input::get('titulo');
    // $items->descricao = Input::get('descricao');
    // $items->arquivo = Input::get('data');
    // $items->save();
    // return redirect()->route('userinfo.index')
    //    ->with('success','Item created successfully');

  }

}

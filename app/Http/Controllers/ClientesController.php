<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Adicionando Model Cliente
use App\Cliente;

use App\Http\Requests;

class ClientesController extends Controller
{
  public function index()
  {
    //Pegando tabela de Cliente do banco de dados
    $clientes = Cliente::get();

    // Padrão
    // return view('usuario');

    // Passando Variavél $clientes e pegando suas informações
    return view('clientes.lista', ['clientes' => $clientes]);
  }

  public function novo()
  {

    return view('clientes.formulario');
  }
  // Salvando Informações no banco de dados (cliente)
  public function salvar(Request $request)
  {
    $cliente = new Cliente();
    $cliente = $cliente->create($request->all());

    \Session::flash('menssagem_sucesso', 'Cliente cadastrado com sucesso');

    return redirect('clientes/novo');
  }

  public function editar($id)
  {
    $cliente = Cliente::findOrFail($id);
    return view('clientes.formulario', ['cliente' => $cliente]);
  }

  public function atualizar($id, Request $request) {
    $cliente = Cliente::findOrFail($id);
    $cliente->update($request->all());
    \Session::flash('menssagem_sucesso', 'Cliente atualizado com sucesso');
    return redirect('clientes/'.$cliente->id.'/editar');
  }

  public function deletar($id) {
    $cliente = Cliente::findOrFail($id);
    $cliente->delete();
    \Session::flash('menssagem_sucesso', 'Deletado com sucesso');
    return redirect('clientes');
  }


}

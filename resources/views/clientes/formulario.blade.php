@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Informe abaixo as informações do cliente
                  <a class="pull-right" href="{{ url('clientes')}}"> Listagem Clientes </a>
                </div>

                <div class="panel-body">
                  @if(Session::has('menssagem_sucesso'))
                    <div class="alert alert-success">
                      {{Session::get('menssagem_sucesso')}}
                    </div>
                  @endif

                  @if (Request::is('*/editar'))
                  {!! Form::model($cliente, ['method' => 'PATCH', 'url' => 'clientes/'.$cliente->id]) !!}
                  @else
                      {!! Form::open(['url' => 'clientes/salvar']) !!}
                  @endif
                  <!-- Input Texto nome do input e class dentro da variavel   -->

                  {!! Form::label('nome', 'Nome')!!}
                  {!! Form::input('texto', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome']) !!}
                  {!! Form::label('endereco', 'Endereço')!!}
                  {!! Form::input('texto', 'endereco', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Endereço']) !!}
                  {!! Form::label('numero', 'Número')!!}
                  {!! Form::input('texto', 'numero', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Número']) !!}
                  {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

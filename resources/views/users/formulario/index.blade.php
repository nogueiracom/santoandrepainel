@extends('vendor.backpack.base.layout')
 <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <?php \Carbon\Carbon::setLocale('pt'); ?>

{{-- Usuarios Cadastrados  --}}
@section('title', 'Usuários Cadastrados')
@section('header')
	<div class="content-header-cadastro">
		<section class="content-header">
		  <h1>
		     Documento para usuário

		  </h1>
		</section>
	</div>
@endsection
@section('content')
	<div class="content">
		<div class="panel panel-default">
  		<div class="content">
        <ul>

        </ul>
          @foreach ($data as $key => $value)
            <li>
              {{$value->user->name}}
            <br />
              {{$value->titulo}}
                </li>
          @endforeach
      </div>
  	</div>
	</div>
@endsection

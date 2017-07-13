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
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Epá!</strong> Preencha todos os campos.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif



    {!! Form::open(array('route' => 'userinfo.cadastro','method'=>'POST', 'enctype'=>'multipart/form-data', 'accept-charset'=> 'ISO-8859-1')) !!}
		{{ csrf_field() }}
  	<div class="row">
  		<div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Nome do documento:</strong>
                  {!! Form::text('titulo', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
              </div>
          </div>
          {{-- <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Descrição:</strong>
                  {!! Form::textarea('descricao', null, array('placeholder' => 'Descrição documento','class' => 'form-control')) !!}
              </div>
          </div> --}}
					<div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Selecionar Arquivo:</strong>
						{!! Form::file('image') !!}
				 </div>
				 </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Selecionar Usuario:</strong>
                  <br />
                  {!! Form::select('data', $data, null, ['class' => 'form-control select2']) !!}



              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-right">
  				<button type="submit" class="btn btn-primary">Enviar documento</button>
          </div>
  	</div>
  	{!! Form::close() !!}
	</div>
	</div>
	</div>

@endsection

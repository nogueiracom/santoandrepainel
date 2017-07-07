@extends('vendor.backpack.base.layout')
 <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <?php \Carbon\Carbon::setLocale('pt'); ?>

	{{-- Usuarios Cadastrados  --}}
	@section('title', 'Editar Usuário')
	@section('header')
		<div class="content-header-cadastro">
			<section class="content-header">
			  <h1> Cadastrar um novo usuário  </h1>

				<ol class="breadcrumb semseta">
	        <li><a class="btn btn-success" href="javascript:history.back()">Voltar</a></li>
	      </ol>
			</section>
		</div>
	@endsection

@section('content')
	<div class="content">
		<div class="panel panel-default">
			<div class="content">

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Nome:</strong>
				                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>E-mail:</strong>
				                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Senha:</strong>
				                {!! Form::password('password', array('placeholder' => 'Senha','class' => 'form-control')) !!}
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Confirma senha:</strong>
				                {!! Form::password('confirm-password', array('placeholder' => 'Confirma senha','class' => 'form-control')) !!}
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Empreendimento:</strong>
				                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
								<button type="submit" class="btn btn-primary">Criar</button>
				        </div>
					</div>
					{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection

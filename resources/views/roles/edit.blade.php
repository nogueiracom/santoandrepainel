@extends('vendor.backpack.base.layout')
 <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <?php \Carbon\Carbon::setLocale('pt'); ?>

{{-- Usuarios Cadastrados  --}}
@section('title', 'Usuários Cadastrados')
@section('header')
	<div class="content-header-cadastro">
		<section class="content-header">
		  <h1>
		     Editar Função
		  </h1>
			<ol class="breadcrumb semseta">
				@permission('role-create')
        	<li><a class="btn btn-success" href="{{ route('roles.index') }}">Voltar</a></li>
				@endpermission
      </ol>
		</section>
	</div>
@endsection


@section('content')
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
	{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permisão para:</strong>
                <br/>
                @foreach($permission as $value)
                	<label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                	{{ $value->display_name }}</label>
                	<br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
				<button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
	</div>
	{!! Form::close() !!}
</div>
</div>
@endsection

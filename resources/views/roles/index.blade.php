@extends('vendor.backpack.base.layout')
 <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <?php \Carbon\Carbon::setLocale('pt'); ?>

{{-- Usuarios Cadastrados  --}}
@section('title', 'Usuários Cadastrados')
@section('header')
	<div class="content-header-cadastro">
		<section class="content-header">
		  <h1>
		     Funções de usuários
		  </h1>
			<ol class="breadcrumb semseta">
				@permission('role-create')
        	<li><a class="btn btn-success" href="{{ route('roles.create') }}">Nova função</a></li>
				@endpermission
      </ol>
		</section>
	</div>
@endsection

@section('content')
	<div class="panel panel-default">
		<div class="content">

		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif
		<table class="table table-bordered">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th width="280px">Configuração</th>
			</tr>
		@foreach ($roles as $key => $role)
		<tr>
			<td>{{ ++$i }}</td>
			<td>{{ $role->display_name }}</td>
			<td>{{ $role->description }}</td>
			<td>
				<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Vizualisar</a>
				@permission('role-edit')
				<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
				@endpermission
				@permission('role-delete')
				{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
	            {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
	        	{!! Form::close() !!}
	        	@endpermission
			</td>
		</tr>
		@endforeach
		</table>
		{!! $roles->render() !!}
	</div>
</div>
@endsection

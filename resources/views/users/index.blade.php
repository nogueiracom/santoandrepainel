@extends('vendor.backpack.base.layout')
 <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <?php \Carbon\Carbon::setLocale('pt'); ?>

{{-- Usuarios Cadastrados  --}}
@section('title', 'Usuários Cadastrados')
@section('header')
	<div class="content-header-cadastro">
		<section class="content-header">
		  <h1>
		     Usuários Cadastrados

		  </h1>
			<ol class="breadcrumb semseta">
	        <li><a class="btn btn-success" href="{{ url('/admin/usuarios/informacoes') }}">Documento para usuário</a></li>
	        <li><a class="btn btn-success" href="{{ route('users.create') }}">Criar novo usuário</a></li>
	      </ol>
		</section>
	</div>
@endsection


@section('content')
	<div class="content">
		<div class="panel panel-default">
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			<table class="table table-bordered">
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Função</th>
					<th width="280px">Configuração</th>
				</tr>
			@foreach ($data as $key => $user)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					@if(!empty($user->roles))
						@foreach($user->roles as $v)
							<label class="label label-success">{{ $v->display_name }}</label>
						@endforeach
					@endif
				</td>
				<td>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#{{$user->id}}">
						Vizualisar
					</button>

					<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
					{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
								{!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
				</td>
			</tr>
			{{-- MODAL  --}}
			<div class="modal modal-info fade" id="{{$user->id}}" style="display: none;">
			<div class="modal-dialog">
					<div class="box box-widget widget-user">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">{{$user->name}}</h3>
							@foreach ($user->roles as $role)
									@if($role->name)
									<h5 class="widget-user-desc">Empreendimento: <b>{{$role->name}}</b></h5>
									@endif
							@endforeach
            </div>

            <div class="widget-user-image">

              @if ($user->avatar)
                <img class="img-circle" src="/uploads/avatars/{{ $user->avatar }}" alt="{{$user->name}}">
              @endif


            </div>

            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">{{count($user->documento)}}</h5>
										@if (count($user->documento) === 0)
											<span class="description-text">Documento</span>
										@elseif (count($user->documento) > 1 )
											<span class="description-text">Documentos</span>
										@endif

                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="description-block">

                    <h5 class="description-header">{{count($user->chamado)}}</h5>
										@if (count($user->chamado) === 0 )
											<span class="description-text">CHAMADO</span>
										@elseif (count($user->chamado) === 1 )
											<span class="description-text">CHAMADO</span>
										@elseif (count($user->chamado) > 1)
											<span class="description-text">CHAMADOS</span>
										@endif

                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                {{-- <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">35</h5>
                    <span class="description-text">PRODUCTS</span>
                  </div>
                  <!-- /.description-block -->
                </div> --}}
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
			</div>
			@endforeach
			</table>
			{!! $data->render() !!}
		</div>
	</div>



@endsection

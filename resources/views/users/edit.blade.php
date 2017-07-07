@extends('vendor.backpack.base.layout')
 <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <?php \Carbon\Carbon::setLocale('pt'); ?>

	{{-- Usuarios Cadastrados  --}}
	@section('title', 'Editar Usuário')
	@section('header')
		<div class="content-header-cadastro">
			<section class="content-header">
			  <h1> Editar Usúario  </h1>

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

				{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
				<div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#{{$user->id}}">
        						Adicionar Foto
        					</button>
                </div>
              </div>
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
			                {!! Form::password('senha', array('placeholder' => 'Password','class' => 'form-control')) !!}
			            </div>
			        </div>
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Confirma Senha:</strong>
			                {!! Form::password('confirm-password', array('placeholder' => 'Confirma senha','class' => 'form-control')) !!}
			            </div>
			        </div>
			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Empreendimento:</strong>
			                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
			            </div>
			        </div>
			        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
							<button type="submit" class="btn btn-primary">Editar</button>
			        </div>
				</div>
				{!! Form::close() !!}
				</div>
			</div>
	</div>

  {{-- MODAL  --}}
  <div class="modal modal-info fade" id="{{$user->id}}" style="display: none;">
  <div class="modal-dialog">
      <div class="box box-widget widget-user">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active">
          <form enctype="multipart/form-data" action="/admin/users" method="POST">
              <label>Adicionar uma nova foto</label>
              <input type="file" name="avatar">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="submit" class="pull-right btn btn-sm btn-primary">
          </form>
        </div>


      </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
@endsection

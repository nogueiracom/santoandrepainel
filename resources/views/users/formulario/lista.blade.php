@extends('vendor.backpack.base.layout')
 <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <?php \Carbon\Carbon::setLocale('pt'); ?>

{{-- Usuarios Cadastrados  --}}
@section('title', 'Usuários Cadastrados')
@section('header')

  <section class="content-header">
    <h1>
       Lista de documentos
    </h1>
  </section>
@endsection
@section('content')
	<div class="panel panel-default">
  	<div class="content">

        <a style="margin-bottom: 10px;" href="{{url('/admin/documentos/novo')}}" class="btn btn-primary ladda-button" data-style="zoom-in"><span class="ladda-label">
          <i class="fa fa-plus"></i> Novo Documento</span>
        </a>

        <table id="crudTable" class="table table-bordered table-striped display dataTable" role="grid" aria-describedby="crudTable_info" style="width: 1029px;">
            <thead>
              <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" style="width: 127.006px;" aria-label="Date: activate to sort column ascending">Nome</th>
                <th class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" style="width: 103.006px;" aria-label="Status: activate to sort column ascending">Data</th>
                <th class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" style="width: 142.006px;" aria-label="Title: activate to sort column ascending">Arquivo</th>
                <th class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" style="width: 142.006px;" aria-label="Title: activate to sort column ascending">Funções</th>
                </tr>
            </thead>
        <tbody>

            @foreach ($usuario as $user)
              <tr role="row" class="even">
                  <td>
                	 {{$user->name}}
                  </td>
                  <td>{{date('d/m/Y', strtotime($user->created_at))}}</td>
                  <td>{{$user->titulo}}</td>

                  <td><!-- Single edit button -->
                  
                    <a href="{{$user->arquivo}}" download="{{$user->arquivo}}" class="btn btn-xs btn-default" data-button-type="delete"><i class="fa fa-edit"></i> Visualizar</a>
                    {!! Form::open(['method' => 'DELETE','action' => ['UserFormController@deletar', $user->documentoid],'style'=>'display:inline']) !!}
            	         {!! Form::submit('Deletar', ['class' => 'btn btn-xs btn-default']) !!}
            	      {!! Form::close() !!}
                    {{-- <a href="{{route()}}" class="btn btn-xs btn-default" data-button-type="delete"><i class="fa fa-trash"></i> Deletar</a> --}}
            	  	</td>
              </tr>



            @endforeach

        </tbody>
      </table>
  	</div>
	</div>

  @section('after_styles')
    <!-- DATA TABLES -->
    <link href="{{ asset('vendor/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/crud.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/list.css') }}">

    <!-- CRUD LIST CONTENT - crud_list_styles stack -->
    @stack('crud_list_styles')
  @endsection

  @section('after_scripts')
    <!-- DATA TABLES SCRIPT -->
    <script src="{{ asset('vendor/adminlte/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>

    <script src="{{ asset('vendor/backpack/crud/js/crud.js') }}"></script>
    <script src="{{ asset('vendor/backpack/crud/js/form.js') }}"></script>
    <script src="{{ asset('vendor/backpack/crud/js/list.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" type="text/javascript"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js" type="text/javascript"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js" type="text/javascript"></script>

    <script>
      $(function () {
        $('#crudTable').DataTable({
          "language": {
                "emptyTable":     "{{ trans('backpack::crud.emptyTable') }}",
                "info":           "{{ trans('backpack::crud.info') }}",
                "infoEmpty":      "{{ trans('backpack::crud.infoEmpty') }}",
                "infoFiltered":   "{{ trans('backpack::crud.infoFiltered') }}",
                "infoPostFix":    "{{ trans('backpack::crud.infoPostFix') }}",
                "thousands":      "{{ trans('backpack::crud.thousands') }}",
                "lengthMenu":     "{{ trans('backpack::crud.lengthMenu') }}",
                "loadingRecords": "{{ trans('backpack::crud.loadingRecords') }}",
                "processing":     "{{ trans('backpack::crud.processing') }}",
                "search":         "{{ trans('backpack::crud.search') }}",
                "zeroRecords":    "{{ trans('backpack::crud.zeroRecords') }}",
                "paginate": {
                    "first":      "{{ trans('backpack::crud.paginate.first') }}",
                    "last":       "{{ trans('backpack::crud.paginate.last') }}",
                    "next":       "{{ trans('backpack::crud.paginate.next') }}",
                    "previous":   "{{ trans('backpack::crud.paginate.previous') }}"
                },
                "aria": {
                    "sortAscending":  "{{ trans('backpack::crud.aria.sortAscending') }}",
                    "sortDescending": "{{ trans('backpack::crud.aria.sortDescending') }}"
                }
            },

        });
      });
    </script>
  @endsection

@endsection

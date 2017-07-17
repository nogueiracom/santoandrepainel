@extends('vendor.backpack.base.layout')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
 <?php \Carbon\Carbon::setLocale('pt'); ?>

@section('title', 'Chamados')
@section('header')
	<section class="content-header">
	  <h1>
	     Chamados
	  </h1>    
	</section>
@endsection
@section('content')
            <style media="screen">
            #crudTable_info,
              #crudTable_paginate {
                display: none !important;
              }
            </style>
            <div class="panel panel-default">


                <div class="panel-body">
                    @if ($tickets->isEmpty())
                        <p>Não existe chamado.</p>
                    @else

                      <table id="crudTable" class="table table-bordered table-striped display dataTable" role="grid" aria-describedby="crudTable_info" style="width: 1029px;">
                          <thead>
                              <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" style="width: 127.006px;" aria-label="Date: activate to sort column ascending">Categoria</th>
                                <th class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" style="width: 103.006px;" aria-label="Status: activate to sort column ascending">Titulo</th>
                                <th class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" style="width: 142.006px;" aria-label="Title: activate to sort column ascending">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" style="width: 142.006px;" aria-label="Title: activate to sort column ascending">Criado</th>
                                <th class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" style="width: 142.006px;" aria-label="Title: activate to sort column ascending">Funções</th>

                              </tr>
                          </thead>
                            <tbody>
                            @foreach ($tickets as $ticket)
                                <tr role="row" class="even">
                                    <td>
                                    @foreach ($categories as $category)
                                        @if ($category->id === $ticket->category_id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/chamados/'. $ticket->ticket_id) }}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </td>
                                    <td>
                                    @if ($ticket->status === 'Open')
                                        <span class="label label-success">{{ $ticket->status }}</span>
                                    @else
                                        <span class="label label-danger">{{ $ticket->status }}</span>
                                    @endif
                                    </td>
                                    <td>
                                      {{ Carbon\Carbon::parse($ticket->updated_at)->format('d-m-Y') }}
                                  </td>
                                    <td>
                                      <a href="{{ url('admin/chamados/' . $ticket->ticket_id) }}" class="btn btn-primary comentarios">Comentar</a>
                                        <form action="{{ url('admin/chamado_fechado/' . $ticket->ticket_id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-danger">Encerrar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $tickets->render() }}
                    @endif
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

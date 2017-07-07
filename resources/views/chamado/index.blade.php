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

            <div class="panel panel-default">


                <div class="panel-body">
                    @if ($tickets->isEmpty())
                        <p>Não existe chamado.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Titulo</th>
                                    <th>Status</th>
                                    <th>Criado</th>
                                    <th style="text-align:center" colspan="2">Funções</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
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
                                    <td>{{ $ticket->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/chamados/' . $ticket->ticket_id) }}" class="btn btn-primary comentarios">Comentar</a>
                                    </td>
                                    <td>
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
@endsection

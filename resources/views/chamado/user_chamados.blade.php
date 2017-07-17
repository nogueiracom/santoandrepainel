@extends('layouts.app')

@section('title', 'Chamados')
@section('content')
  <div class="container">
    <div class="row">
        <div class="sidebar">
            @foreach ($pages as $page)
              <a href="{{url('/'.$page->slug)}}">
                <img src="{{json_decode($page->nome_usuario)->image}}" alt="{{$page->name}}" title="{{$page->name}}">
              </a>
            <ul>
              <li><img src="{{asset('/images/cliente/documento.png')}}" alt="Documentos"><span>Documentos</span><a href="{{url('/documentos')}}"></a></li>
              <li><img src="{{asset('/images/cliente/comunicado.png')}}" alt="Comunicados"><span>Comunicados</span><a href="{{url('/comunicados')}}"></a></li>
              <li><img src="{{asset('/images/cliente/fotos-da-obra.png')}}" alt="Fotos da Obra"><span>Fotos da Obra</span><a href="{{url('/fotos-da-obra')}}"></a></li>
              <li><img src="{{asset('/images/cliente/chamado.png')}}" alt="Chamado"><span>Chamado</span><a href="{{url('/chamados')}}"></a></li>
              <li><img src="{{asset('/images/cliente/avaliacao.png')}}" alt="Avaliação dos Corretores"><span>Avaliação dos Corretores</span></li>
            </ul>
            @endforeach
        </div>
        <div class="content-chamados margin">
            <h1><b>CHAMADO</b></h1>
            <p>Encontrou algum problema estrutural na sua obra? Utilize este canal e comunique a ocorrência diretamente a <u>SA Empreendimentos</u>. </p>

            <div class="panel panel-default">
                <div class="panel-heading">
                </div>

                <div class="panel-body">
                    @if ($tickets->isEmpty())
                        <p>Não possui nenhum chamado. Deseja abrir um? <a href="{{ url('novo_chamado') }}">Clique aqui</a></p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>CATEGORIA</th>
                                    <th>TITULO</th>
                                    <th>STATUS</th>
                                    <th>ATUALIZADO EM</th>
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
                                        <a href="{{ url('chamados/'. $ticket->ticket_id) }}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </td>
                                    <td>
                                    @if ($ticket->status === 'Aberto')
                                        <span class="label label-success">{{ $ticket->status }}</span>
                                    @else
                                        <span class="label label-danger">{{ $ticket->status }}</span>
                                    @endif
                                    </td>
                                    <td>{{ $ticket->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
            <a class="novochamado" href="{{ url('novo_chamado') }}">Novo Chamado</a>
        </div>

      </div>
    </div>
@endsection

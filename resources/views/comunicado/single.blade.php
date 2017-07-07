@extends('layouts.app')
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
              <li><img src="{{asset('/images/cliente/fotos-da-obra.png')}}" alt="Documentos"><span>Fotos da Obra</span><a href="{{url('/fotos-da-obra')}}"></a></li>
              <li><img src="{{asset('/images/cliente/chamado.png')}}" alt="Documentos"><span>Chamado</span></li>
              <li><img src="{{asset('/images/cliente/avaliacao.png')}}" alt="Documentos"><span>Avaliação dos Corretores</span></li>
            </ul>
            @endforeach
        </div>
        @foreach ($comunicado as $key => $value)

        <div class="content-comunicado margin">
          @if ($value->title)
              <h1><b>{{$value->title}}</b></h1>
          @endif

          @if ($value->content)
            <div class="conteudo">
              {!!$value->content!!}
            </div>
          @endif

          <a class="back" href="javascript:history.back()">Voltar</a>
        </div> <!-- Content -->
      @endforeach

    </div>
  </div>


@endsection

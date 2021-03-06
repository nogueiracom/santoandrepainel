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
              <li><img src="{{asset('/images/cliente/fotos-da-obra.png')}}" alt="Fotos da Obra"><span>Fotos da Obra</span><a href="{{url('/fotos-da-obra')}}"></a></li>
              <li><img src="{{asset('/images/cliente/chamado.png')}}" alt="Chamado"><span>Chamado</span><a href="{{url('/chamados')}}"></a></li>
              <li><img src="{{asset('/images/cliente/avaliacao.png')}}" alt="Avaliação dos Corretores"><span>Avaliação dos Corretores</span></li>
            </ul>
            @endforeach
        </div>
        <div class="content margin">
          <h1><b>DOCUMENTOS</b></h1>
          <p>Nesta área você tem acesso a todos os documentos referentes ao seu apartamento disponíveis para download. Caso não encontre o documento que necessite, entre em contato com a <u>SA Empreendimentos</u> e faça a solicitação. </p>
          <div class="row">
          @forelse ($usuario as $key => $value)
              @if ($value->id = $value->id)
                    <div class="item">
                      <div class="color">
                        <img src="{{URL::asset('/uploads/img/pdf-icon.png')}}" alt="PDF" title="PDF">
                        <p>{{$value->titulo}}</p>
                        <a href="{{$value->arquivo}}" title="{{$value->titulo}}" download></a>
                      </div>
                    </div>
              @endif

              @empty
                <p>No users</p>

          @endforelse
            </div>
        </div>

    </div>
  </div>


@endsection

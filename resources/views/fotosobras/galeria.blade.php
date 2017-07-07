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
        <div class="galeria margin">



          @foreach ($fotos as $post)
          <h1><b>{{$post->title}}</b></h1>

            @if ($post->photos && $post->content)
            <div class="row">

            <div class="conteudo">
              {!!$post->content!!}
            </div>

            @foreach ($post->photos as $key)
                <div class="img-box">
                  <figure>
                    <a data-fancybox="gallery" href="{{url('/uploads/thumbs/'.$key)}}">
                      <img src="{{url('/uploads/thumbs/site/'.$key)}}" />
                      <div class="middle">
                      <div class="text"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                      </div>
                    </a>
                  </figure>

                </div>

            @endforeach
          </div> <!-- Row -->

          @else
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras convallis iaculis turpis ac vestibulum. Fusce bibendum mi vitae lectus mattis, vel sollicitudin lorem hendrerit. Aenean imperdiet rutrum condimentum.</p>
          @endif

          @endforeach

    </div>
  </div>
  </div>



@endsection

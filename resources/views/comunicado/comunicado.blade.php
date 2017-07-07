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
        <div class="content-comunicado margin">
          <h1><b>Comunicado</b></h1>
          <div class="row">
            <div class="box-notificacao">
                <div class="color">
                    @foreach ($postagens as $key => $value)
                      <div class="media">
                        <a href="{{url('/comunicado/'.$value->slug)}}"></a>
                          <div class="img">
                            @if ($value->image)
                                <img src="{{$value->image}}" class="media-photo" />

                              @else
                                <img src="/images/logo.png" class="media-photo">
                            @endif
                          </div>

                        <div class="media-body">
                          <span>{{ Carbon\Carbon::parse($value->date)->format('d-m-Y') }}</span>
                          <h4 class="title">
                            {{$value->title}}
                            {{-- <span class="pull-right pagado">(Pagado)</span> --}}

                          </h4>
                          <div class="summary">  {!! str_limit($value->content, $limit = 80, $end = '...') !!}</div>
                        </div>
                      </div> <!-- Media -->
                    @endforeach

                    <?php echo $postagens->render(); ?>


                </div>
              </div>
            </div>
        </div>


    </div>
  </div>


@endsection

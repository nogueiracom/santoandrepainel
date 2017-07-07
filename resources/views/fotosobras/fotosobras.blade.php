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
        <div class="content-obras margin">
          <h1><b>FOTOS DA OBRA</b></h1>
          <p>Aqui você pode conferir o andamento da construção. Acompanhe cada fase da obra, desde sua fundação até o acabamento.</p>
          <div class="row">

            <div class="panel-group wrap" id="bs-collapse">

                <?php   if (!empty($postagens)) {
                      $data['customers'] = [];

                      foreach ($postagens as $r => $row) {
                        if (isset($data['customers'][$row->tags])) {
                            continue;
                        } ?>
                      <div class="panel">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" class="collapsed" data-parent="#bs-collapse" href="#{{$row->tags}}"> FOTOS DE {{$row->tags}} <span></span></a>
                            </h4> <!-- h4  -->
                          </div> <!-- panel-heading -->

                          <div id="{{$row->tags}}" class="panel-collapse collapse">
                            <div class="panel-body">
                              <div class="row">
                              <?php
                                $city = $row->tags;
                                $data['customers'][$city] = [];
                                $data['customers'][$city]['id'] = $row->id;

                                foreach ($postagens as $pid => $programs) {
                                    if ($city == $programs->tags) { ?>
                                      <div class="box">
                                        <div class="color">
                                          <i class="fa fa-camera" aria-hidden="true"></i>
                                          <p>
                                            {{$programs->title}}
                                          </p>
                                          <div class="middle">
                                            <div class="text"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                                          </div>
                                          <a href="{{url('/fotos/'.$programs->slug)}}"></a>
                                        </div>

                                      </div>
                                  <?php  }
                                } ?>
                                </div>
                            </div> <!-- Body Panel -->
                          </div> <!-- loop colapse -->
                      </div> <!-- Painel -->

                    <?php   } } ?>

            </div> <!-- panel-group -->

        </div> <!-- Row -->
    </div>
  </div>
  </div>



@endsection

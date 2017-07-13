@extends('layouts.app')
  <?php \Carbon\Carbon::setLocale('pt'); ?>

@section('title', $ticket->title)

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
              <li><img src="{{asset('/images/cliente/chamado.png')}}" alt="Documentos"><span>Chamado</span><a href="{{url('/chamados')}}"></a></li>
              <li><img src="{{asset('/images/cliente/avaliacao.png')}}" alt="Documentos"><span>Avaliação dos Corretores</span></li>
            </ul>
            @endforeach
        </div>

        <div class="content-chamados">


            <div class="panel-body">
              <h1><b>#{{ $ticket->ticket_id }} - {{ $ticket->title }}</b></h1>
                @include('chamado.flash')

                <div class="comments">
                  <div id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="card">
                       <div class="card-header" role="tab" id="headingOne">
                         <h5 class="mb-0">
                           <a data-toggle="collapse" data-parent="#accordion" href="#open" aria-expanded="true" aria-controls="collapseOne">
                             <img class="imagem-usuario" src="/images/cliente/user.png" alt="message user image">
                             <p>
                               <b>{{$ticket->user->name}}</b>
                             </p>

                             <p><b>Acompanhando chamado:</b> {{ $ticket->message }}
                             @foreach ($categorias as $category)
                                 @if ($category->id === $ticket->category_id)
                                     <b>Categoria:</b> {{ $category->name }}
                                 @endif
                             @endforeach



                             @if ($ticket->status === 'Aberto')
                                 <b>Status:</b> <span class="label label-success">{{ $ticket->status }}</span>
                             @else
                                <span class="label label-danger">{{ $ticket->status }}</span>
                             @endif
                             </p>

                             <p class="criado"><b>Criado:</b> {{$ticket->created_at->diffForHumans() }}</p>
                          </a>
                        </h5>
                      </div>



                      <div id="open" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                          <div class="card-block">
                        @foreach ($comments as $comment)


                          @if($ticket->user->id === $comment->user_id)
                          <div class="row msg_container base_receive">
                              <div class="col-md-2 col-xs-2 avatar">
                                  <img src="/images/cliente/user.png">
                              </div>
                              <div class="col-md-10 col-xs-10">
                                  <div class="messages msg_receive">
                                      <b>{{ $comment->user->name }}</b>
                                      <p>{{ $comment->comment }}</p>
                                      <time datetime="{{ $comment->created_at->format('Y-m-d') }}">{{ $comment->created_at->format('Y-m-d') }}</time>
                                  </div>
                              </div>
                          </div> <!--- Cliente -->
                          @else
                          <div class="row msg_container base_sent">
                              <div class="col-md-10 col-xs-10">
                                  <div class="messages msg_sent">
                                      <b>{{ $comment->user->name }}</b>
                                      <p>{{ $comment->comment }}</p>
                                      <time datetime="{{ $comment->created_at->format('Y-m-d') }}">{{ $comment->created_at->format('Y-m-d') }}</time>
                                  </div>
                              </div>
                              <div class="col-md-2 col-xs-2 avatar">
                                  <img src="/images/logo.png" class=" img-responsive ">
                              </div>
                          </div> <!-- Admin -->
                          @endif
                         @endforeach
                        </div>
                      </div>


                    </div>
                  </div>
                </div>





                <div class="comment-form">
                    <form action="{{ url('comentario') }}" method="POST" class="form">
                        {!! csrf_field() !!}

                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                            @if ($errors->has('comment'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                  </div>
                </div>
        </div>
    </div>
      </div>
    </div>
@endsection

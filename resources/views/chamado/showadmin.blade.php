@extends('vendor.backpack.base.layout')
 <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  <?php \Carbon\Carbon::setLocale('pt'); ?>

@section('title', $ticket->title)

@section('content')

        <div class="dashboardchamado">
            <div class="panel-body">
              <h1><b>#{{ $ticket->ticket_id }} - {{ $ticket->title }}</b></h1>
                <a class="voltar" href="javascript:history.back()">
                  <button href="javascript:history.back()" type="button" class="btn btn-primary pull-right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar</button>
                </a>
                @include('chamado.flash')
            <div class="box box-widget collapsed-box">
              <div class="box-header with-border">
                <div class="user-block">
                  <img class="img-circle" src="/images/cliente/user.png" alt="Imagem de Usuario">
                  <span  data-widget="collapse" class="username">{{$ticket->user->name}}</span>
                  <p><b>Acompanhando chamado:</b> {{ $ticket->message }}
                    @foreach ($categorias as $category)
                        @if ($category->id === $ticket->category_id)
                            <b class="categoria">Categoria:</b> {{ $category->name }}

                        @endif
                    @endforeach

                    <b class="categoria">Criado:</b> {{$ticket->created_at->diffForHumans() }}

                  </p>
                  @foreach ($comments as $comment)
                    @if ($loop->first)
                      <span class="description">Data da publicação: {{ $comment->created_at->format('Y-m-d') }}</span>
                    @endif
                  @endforeach
                </div>
                <!-- /.user-block -->
                <div class="box-tools">
                  @if ($ticket->status === 'Aberto')
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="{{ $ticket->status }}">
                      <i class="fa fa-circle text-green"></i></button>
                  @else
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="{{ $ticket->status }}">
                      <i class="fa fa-circle text-red"></i></button>
                  @endif

                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>

                </div>
                <!-- /.box-tools -->
              </div>
            <!-- /.box-header -->

            @foreach ($comments as $comment)

              @if ($loop->first)
              <div class="box-body" style="display: none;">
                <p>{{ $comment->comment }}</p>
                <span class="pull-right text-muted"></span>
              </div>
              @endif
            @endforeach
            <!-- /.box-body -->
            <div class="box-footer box box-warning direct-chat direct-chat-warning" style="display: none;">
              <?php $i = 0 ?>
              @foreach ($comments as $comment)
                @if ($comment->ticket_id === $ticket->id)
                  <div class="box-comment">
                    <!-- User image -->
                    @if($ticket->user->id === $comment->user_id)
                        <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                              <span class="direct-chat-name pull-left">{{ $comment->user->name }}</span>
                              <span class="direct-chat-timestamp pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="/images/cliente/user.png" alt="message user image"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                            {{ $comment->comment }}
                            </div>
                            <!-- /.direct-chat-text -->
                          </div>
                    @else
                      <div class="direct-chat-msg right">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-right">{{ $comment->user->name }}</span>
                            <span class="direct-chat-timestamp pull-left">{{ $comment->created_at->format('Y-m-d') }}</span>
                          </div>
                          <!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="/images/logo.png" alt="Santo André"><!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            {{ $comment->comment }}
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>

                    @endif

                    <!-- /.comment-text -->
                  </div>
                  <!-- /.box-comment -->
                @endif
                <?php $i++ ?>

              @endforeach


            </div>

            <!-- /.box-footer -->
            <div class="box-footer" style="display: none;">
              <form action="{{ url('comentario') }}" method="POST" class="form">
                  {!! csrf_field() !!}
                <img class="img-responsive img-circle img-sm" src="/images/logo.png" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                  <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                      <textarea rows="3" id="comment" class="form-control" name="comment"></textarea>

                      @if ($errors->has('comment'))
                          <span class="help-block">
                              <strong>{{ $errors->first('comment') }}</strong>
                          </span>
                      @endif
                      <div class="form-group">
                          <button style="margin-top: 15px;" type="submit" class="btn btn-primary">Enviar</button>
                      </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
        </div>
    </div>
@endsection

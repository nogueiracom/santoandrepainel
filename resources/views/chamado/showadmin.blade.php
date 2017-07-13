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
            <div id="imp" class="box box-widget collapsed-box">
              <div class="box-header with-border">
                <div  data-widget="collapse" class="user-block">
                  <img class="img-circle" src="/images/cliente/user.png" alt="Imagem de Usuario">
                  <span  class="username">{{$ticket->user->name}}</span>

                  <p><b>Acompanhando chamado:</b> {{ $ticket->message }}
                  </p>
                  <p style="margin-left: 40px;">
                    @foreach ($categorias as $category)
                        @if ($category->id === $ticket->category_id)
                            <b class="categoria">Categoria:</b> {{ $category->name }}

                        @endif
                    @endforeach

                    <b class="categoria">Criado:</b> {{$ticket->created_at->diffForHumans() }}

                    <?php
                     $teste = json_decode( $ticket->nome_empreendimento);
                     if ($teste) {
                       foreach ($teste as $key ) {
                        echo '<b class="categoria">Empreendimento: </b>'.$key->name.'';
                       }
                     }
                    ?>

                    <b class="categoria">Torre: </b>{{$ticket->torre}}
                    <b class="categoria">Apartamento: </b>{{$ticket->apto}}
                    <b class="categoria">Andar: </b>{{$ticket->andar}}
                  </p>
                  @foreach ($comments as $comment)
                    @if ($loop->first)
                      <span class="description">Data da publicação: {{ $comment->created_at->format('d-m-Y') }}</span>
                    @endif
                  @endforeach
                  <button style="margin-left: 50px; margin-top: 10px;" type="button" class="btn btn-primary" id="cmd" name="button">Imprimir</button>
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


    <script script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script tupe="text/javascript">
    $(function () {

    $('#cmd').click(function () {
      var doc = new jsPDF();
      doc.addHTML($('#imp')[0], 5, 5, {
        'background': '#fff',
      }, function() {
        doc.save('chamado-<?php echo $ticket->ticket_id ?>-<?php echo $ticket->created_at ?>.pdf');
      });
    });
  });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script src="{{asset('/js/html2canvas.js')}}"></script>
@endsection

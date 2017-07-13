@extends('layouts.app')

@section('title', 'Open Ticket')

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
    <div class="content-chamados margin">
            <h1><b>NOVO CHAMADO</b></h1>



                <div class="row">
                    @include('chamado.flash')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/novo_chamado') }}">
                        {!! csrf_field() !!}

                        <div class="boxform">
                          <div class="{{ $errors->has('title') ? ' has-error' : '' }}">
                              <label for="title" class="control-label">Nome</label>


                                  <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                                  {{-- @if ($errors->has('title'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('title') }}</strong>
                                      </span>
                                  @endif --}}
                          </div>
                        </div>

                        <div class="boxform">
                        <div class="{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="control-label">Categoria</label>

                              <select id="category" type="category" class="form-control" name="category">
                                  <option value="">Selecionar categoria</option>
                                  @foreach ($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                              </select>

                                {{-- @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif --}}
                        </div>
                      </div>
                        <div class="boxform">
                          <div class="{{ $errors->has('priority') ? ' has-error' : '' }}">
                              <label for="priority" class="control-label">Prioridade</label>
                                <select id="priority" type="" class="form-control" name="priority">
                                    <option value="">Selecionar prioridade</option>
                                    <option value="low">Baixa</option>
                                    <option value="medium">Média</option>
                                    <option value="high">Alta</option>
                                </select>

                                {{-- @if ($errors->has('priority'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                @endif --}}
                          </div>
                        </div>

                        <div class="boxform">
                          <div class="{{ $errors->has('title') ? ' has-error' : '' }}">
                              <label for="torre" class="control-label">Torre</label>
                              <input id="torre" type="text" class="form-control" name="torre" value="{{ old('torre') }}">
                          </div>
                        </div>


                        <div class="boxform">
                          <div class="{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="andar" class="control-label">Andar</label>
                            <input id="andar" type="text" class="form-control" name="andar" value="{{ old('andar') }}">
                          </div>
                        </div>

                        <div class="boxform">
                          <div class="{{ $errors->has('title') ? ' has-error' : '' }}">
                              <label for="title" class="control-label">Apartamento</label>
                                <input id="apartamento" type="text" class="form-control" name="apartamento" value="{{ old('apartamento') }}">
                            </div>
                        </div>

                        <div class="textarea {{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="control-label">Message</label>


                                <textarea rows="10" id="message" class="form-control" name="message"></textarea>
{{--
                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif --}}
                        </div>


                        <button type="submit" class="btnchamado">
                            Abrir chamado
                        </button>
                    </form>
            </div>
        </div>
    </div>
  </div>
@endsection

@extends('layouts.apphome')

@section('content')
<div class="container login-home">
    <div class="row">
        <h2 id="msg"></h2>
        <div class="painel-login">          
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            <h3>Login</h3>
              {{ csrf_field() }}

              <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input id="email" type="email" placeholder="E-mail:" class="form-control" name="email" value="{{ old('email') }}">

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="{{ $errors->has('password') ? ' has-error' : '' }}">

                  <input id="password" placeholder="Senha:" type="password" class="form-control" name="password">

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="login-buttons">

                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Lembra senha
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-sign-in"></i> Entrar
                </button>

              </div> <!-- Login Buttons -->

              <a class="btn btn-link esqueceusenha" href="{{ url('/password/reset') }}">Esqueceu sua senha?</a>


          </form>
        </div>

        <div class="block-footer">

          <h3>aqui você encontra:</h3>

          <ul>
            <li><img src="{{asset('/images/cliente/documento.png')}}" alt="Documentos"><span>Documentos</span></li>
            <li><img src="{{asset('/images/cliente/comunicado.png')}}" alt="Documentos"><span>Comunicados</span></li>
            <li><img src="{{asset('/images/cliente/fotos-da-obra.png')}}" alt="Documentos"><span>Fotos da Obra</span></li>
            <li><img src="{{asset('/images/cliente/chamado.png')}}" alt="Documentos"><span>Chamado</span></li>
            <li><img src="{{asset('/images/cliente/avaliacao.png')}}" alt="Documentos"><span>Avaliação dos Corretores</span></li>

          </ul>

        </div>


    </div>
</div>
@endsection

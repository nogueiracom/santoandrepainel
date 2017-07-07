<div class="sidebar">
      <a href="{{url('/'.$page->slug)}}"><img src="{{$page->image}}" alt="{{$page->name}}" title="{{$page->name}}"/></a>

    <ul>
      <li><img src="{{asset('/images/cliente/documento.png')}}" alt="Documentos"><span>Documentos</span><a href="{{url('/documentos')}}"></a></li>
      <li><img src="{{asset('/images/cliente/comunicado.png')}}" alt="Comunicados"><span>Comunicados</span><a href="{{url('/comunicados')}}"></a></li>
      <li><img src="{{asset('/images/cliente/fotos-da-obra.png')}}" alt="Fotos da Obra"><span>Fotos da Obra</span><a href="{{url('/fotos-da-obra')}}"></a></li>
      <li><img src="{{asset('/images/cliente/chamado.png')}}" alt="Chamado"><span>Chamado</span><a href="{{url('/chamados')}}"></a></li>
      <li><img src="{{asset('/images/cliente/avaliacao.png')}}" alt="Avaliação dos Corretores"><span>Avaliação dos Corretores</span></li>
      <a href="{{url('/logout')}}">Logout</a>
    </ul>
</div>

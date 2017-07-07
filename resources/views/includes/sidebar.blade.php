<div class="sidebar">
      <a href="{{url('/'.$page->slug)}}"><img src="{{$page->image}}" alt="{{$page->name}}" title="{{$page->name}}"/></a>

    <ul>
      <li><img src="{{asset('/images/cliente/documento.png')}}" alt="Documentos"><span>Documentos</span><a href="{{url('/documentos')}}"></a></li>
      <li><img src="{{asset('/images/cliente/comunicado.png')}}" alt="Documentos"><span>Comunicados</span></li>
      <li><img src="{{asset('/images/cliente/fotos-da-obra.png')}}" alt="Documentos"><span>Fotos da Obra</span><a href="{{url('/fotos-da-obra')}}"></a></li>
      <li><img src="{{asset('/images/cliente/chamado.png')}}" alt="Documentos"><span>Chamado</span></li>
      <li><img src="{{asset('/images/cliente/avaliacao.png')}}" alt="Documentos"><span>Avaliação dos Corretores</span></li>
      <a href="{{url('/logout')}}">Logout</a>
    </ul>
</div>

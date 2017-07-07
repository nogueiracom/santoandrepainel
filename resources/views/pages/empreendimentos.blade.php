@foreach ($checkuser as $route)

  @if ($route->slug)

    @extends('layouts.app')
    @section('content')
          <div class="container">
            <div class="row">
              @include('includes.sidebar')


              <div class="content">
                <h1>Olá <b>{{{ Auth::user()->name}}}</b></h1>
                <p>{!! $route->content !!}</p>
              </div>

            </div>
          </div>

            {{-- <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"></div> --}}
                    {{-- {{$page->title}}
                    {!! $page->content !!}

                    <img class="img-responsive" src="{{$page->image}}" />

                    @foreach ($categoria as $key => $value)
                      {{$value->image}} <br />
                        {{$value->title}}
                    @endforeach --}}
                    {{-- <img class="img-responsive" src="" /> --}}


                    {{-- @foreach($testando['extras'] as $extras)
                          {{$extras['meta_title']}}
                      @endforeach --}}
                    {{-- <div class="panel-body">
                  </div>
                </div>
            </div> --}}
    @endsection


@endif



@endforeach

@extends('layouts.app2')

@section('content')

<script type="text/javascript">
    
    $(document).on("click", ".open-Sendcode", function () {
     var mysendCode = $(this).data('id');
     $(".modal-body #sendCode").val( mysendCode );
  });

</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            
            @if(session('failed'))
            <div class="alert alert-danger" role="alert">
                {{ session('failed') }}
            </div>
            @endif

            <br>
            <div class="list-group">
              <li class="list-group-item active">Tus Codigos</li>
              @isset($data)

                      @if ( $data->code_1 != '' )
                        <a href="#" class="open-Sendcode list-group-item list-group-item-action" data-toggle="modal" data-target="#modalstartshare" data-id="{{$data->code_1}}"><p>{{$data->code_1}}</p></a>
                      @endif

                      @if ( $data->code_2 != '' )
                        <a href="#" class="open-Sendcode list-group-item list-group-item-action" data-toggle="modal" data-target="#modalstartshare" data-id="{{$data->code_2}}"><p>{{$data->code_2}}</p></a>
                      @endif

                      @if ( $data->code_3 != '' )
                        <a href="#" class="open-Sendcode list-group-item list-group-item-action" data-toggle="modal" data-target="#modalstartshare" data-id="{{$data->code_3}}"><p>{{$data->code_3}}</p></a>
                      @endif

                      @if ( $data->code_4 != '' )
                        <a href="#" class="open-Sendcode list-group-item list-group-item-action" data-toggle="modal" data-target="#modalstartshare" data-id="{{$data->code_4}}"><p>{{$data->code_4}}</p></a>
                      @endif

                      @if ( $data->code_5 != '' )
                        <a href="#" class="open-Sendcode list-group-item list-group-item-action" data-toggle="modal" data-target="#modalstartshare" data-id="{{$data->code_5}}"><p>{{$data->code_5}}</p></a>
                      @endif

                      @if ( $data->code_6 != '' )
                        <a href="#" class="open-Sendcode list-group-item list-group-item-action" data-toggle="modal" data-target="#modalstartshare" data-id="{{$data->code_6}}"><p>{{$data->code_6}}</p></a>
                      @endif
                    
                      @include('modalstartshare')

              @endisset
              
            </div>
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h1>Escape Games</h1>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection

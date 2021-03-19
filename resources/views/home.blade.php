@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="list-group">
              <li class="list-group-item active">Tus Codigos</li>
              <a href="#" class="list-group-item list-group-item-action">AB65</a>
              <a href="#" class="list-group-item list-group-item-action">2P5T</a>
              <a href="#" class="list-group-item list-group-item-action">12CF</a>
              <a href="#" class="list-group-item list-group-item-action">AB65</a>
              
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

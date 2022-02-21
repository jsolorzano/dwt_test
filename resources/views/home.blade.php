@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} - {{ Auth::user()->name }}
                    <br>
                    <strong>{{ __('Your data:') }}</strong>
                    <br>
                    Last name: {{ Auth::user()->last_name }}
                    <br>
                    Email: {{ Auth::user()->email }}
                    <br>
                    Phone: {{ Auth::user()->phone }}
                    <br>
                    DNI: {{ Auth::user()->dni }}
                    <br>
                    Birthday: {{ Auth::user()->birthday }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

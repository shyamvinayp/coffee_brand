@extends('adminlte::page')
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

@section('title', 'Home | Lara Admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('messages.dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('messages.login_success') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

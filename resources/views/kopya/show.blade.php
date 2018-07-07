@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="/home">Dashboard</a> / <a href="/kopyas">Browse</a> / {{ $kopya->title }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                        <h3>{{ $kopya->title }}</h3>
                        <h6 class="card-subtitle text-muted">
                            <a href="/users/{{ $kopya->user->id }}">{{ $kopya->user->name }}</a> |
                            {{ $kopya->created_at->toFormattedDateString() }}
                        </h6>
                    </div>

                    <hr>

                    <p>{{ $kopya->body }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="/home">Dashboard</a> / Browse
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach ($kopyas as $kopya)
                        <div class="col-md-6" style="margin-bottom: 20px;">
                            <div class="card">
                                <div class="card-header">
                                    {{ $kopya->user->name }} | {{ $kopya->created_at->diffForHumans() }}
                                </div>
                                
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: 800">
                                        {{ $kopya->title }}
                                    </h5>
                                    <p class="card-text">{{ str_limit($kopya->body, 50) }}</p>
                                    <a href="/kopyas/{{ $kopya->id }}" class="btn btn-primary">
                                        Read Kopya
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

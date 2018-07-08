@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="/home">Dashboard</a> / Profile: <strong>{{ $user->name }}</strong>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="text-center">Recent Kopyas</h2>

                    <div class="row">
                        @forelse ($user->kopyas as $kopya)
                        <div class="col-md-6" style="margin-bottom: 20px;">
                            <div class="card">
                                <div class="card-header">
                                    {{ $kopya->created_at->diffForHumans() }}
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

                        @empty
                        <div class="col-lg-12">
                            <h5 class="text-center text-muted">You haven't created one yet.</h5>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

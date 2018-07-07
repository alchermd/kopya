@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <h5 class="card-header">
                                    Create a new <strong>Kopya</strong>
                                </h5>
                                <div class="card-body">
                                    <p class="card-text">
                                        We support text, markdown, and images.
                                    </p>
                                    <a href="/kopyas/create" class="btn btn-primary">
                                        <strong>&plus;</strong> Create
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <h5 class="card-header">
                                    Browse all <strong>Kopyas</strong>
                                </h5>
                                <div class="card-body">
                                    <p class="card-text">Search by subject, professor, or author.</p>
                                    <a href="/kopyas" class="btn btn-primary">
                                        <strong>&rarr;</strong> Browse
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h2 class="text-center">My Kopyas</h2>

                    <div class="row">
                        @forelse ($kopyas as $kopya)
                        <div class="col-md-6" style="margin-bottom: 20px;">
                            <div class="card">
                                <div class="card-header">
                                    <a href="/users/{{ $kopya->user->id }}">{{ $kopya->user->name }}</a> |
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

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

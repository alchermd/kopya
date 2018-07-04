@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="/home">Dashboard</a> / New Kopya
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/kopyas">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            @if ($error = $errors->first('title'))
                                <span class="text-danger float-right">
                                    <small>{{ $error }}</small>
                                </span>
                            @endif
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter a descriptive title" required>
                            <small id="emailHelp" class="form-text text-muted">Example: "Philippine History - Spanish Invasion"</small>
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            @if ($error = $errors->first('body'))
                                <span class="text-danger float-right">
                                    <small>{{ $error }}</small>
                                </span>
                            @endif

                            <textarea class="form-control" name="body" id="body" cols="3" rows="7" placeholder="Place all of your notes here" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

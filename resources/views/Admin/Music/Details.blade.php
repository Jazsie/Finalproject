@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $music->track_name}}</b></h4>
                        <p class="card-text"><b>Aritst: </b> {{ $music->artist_name  }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Popularity: </b> {{ $music->popularity }}</li>
                        <li class="list-group-item"><b>Genre: </b> {{ $music->genre }}</li>
                        <li class="list-group-item"><b>Key: </b> {{ $music->key }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/music/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/music/edit/{{ $music->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/music/delete/{{ $music->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

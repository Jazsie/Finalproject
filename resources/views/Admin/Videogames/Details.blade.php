@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $videogame->name}}</b></h4>
                        <p class="card-text"><b>Developer: </b> {{ $videogame->developer }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Platform: </b> {{ $videogame->platform }}</li>
                        <li class="list-group-item"><b>Publisher: </b> {{ $videogame->publisher }}</li>
                        <li class="list-group-item"><b>Release Date: </b> {{ $videogame->release_date }}</li>
                        <li class="list-group-item"><b>User Score: </b> {{ $videogame->user_score }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="/admin/videogames/" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Back</a>
                        <a href="/admin/videogames/edit/{{ $videogame->_id }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
                        <a href="/admin/videogames/delete/{{ $videogame->_id }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

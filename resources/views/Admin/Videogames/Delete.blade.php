@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/videogames/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="videogameid" id="videogameid" value="{{ $videogame->_id }}">
                <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $videogame->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="platform">Platform</label>
                        <input class="form-control" type="text" name="platform" id="platform" value="{{ $videogame->platform }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="developer">Developer</label>
                        <input class="form-control" type="text" name="developer" id="developer" value="{{ $videogame->developer }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <input class="form-control" type="text" name="publisher" id="publisher" value="{{ $videogame->publisher }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="release_date">Realese Date</label>
                        <input type="number" name="release_date" id="release_date" class="form-control" value="{{ $videogame->release_date }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="user_score">User Score</label>
                        <input type="number" name="user_score" id="user_score" class="form-control" value="{{ $videogame->user_score }}" disabled>
                    </div>
                    <a href="/admin/videogames/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
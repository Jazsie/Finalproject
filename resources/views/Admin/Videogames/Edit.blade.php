@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit</h1>
                <form action="/admin/videogames/edit" method= "POST">
                @csrf
                <input type="hidden" name="videogameid" id="videogameid" value="{{ $videogame->_id }}">
                <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $videogame->name }}">
                    </div>
                    <div class="form-group">
                        <label for="platform">Platform</label>
                        <input class="form-control" type="text" name="platform" id="platform" value="{{ $videogame->platform }}">
                    </div>
                    <div class="form-group">    
                        <label for="developer">Developer</label>
                        <input class="form-control" type="text" name="developer" id="developer" value="{{ $videogame->developer }}">
                    </div>
                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <input class="form-control" type="text" name="publisher" id="publisher" value="{{ $videogame->publisher }}">
                    </div>
                <a href="/admin/videogames/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                <button type="submit" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/music/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="track_name">Name</label>
                        <input class="form-control" type="text" name="track_name" id="track_name">
                    </div>
                    <div class="form-group">
                        <label for="artist_name">Artist</label>
                        <input class="form-control" type="text" name="artist_name" id="artist_name  ">
                    </div>
                    <div class="form-group">
                        <label for="popularity">Popularity</label>
                        <input class="form-control" type="text" name="popularity" id="popularity">
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input class="form-control" type="text" name="genre" id="genre">
                    </div>
                    <div class="form-group">
                        <label for="key">Key</label>
                        <input class="form-control" type="text" name="key" id="key">
                    </div>
                    <a href="/admin/music/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection
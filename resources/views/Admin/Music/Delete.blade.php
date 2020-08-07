@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Delete</h1>
                <form action="/admin/music/delete" method= "POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="musicid" id="musicid" value="{{ $music->_id }}">
                <div class="form-group">
                        <label for="track_name ">Name</label>
                        <input class="form-control" type="text" name="track_name " id="track_name " value="{{ $music->track_name  }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="genre ">Genre</label>
                        <input class="form-control" type="int" name="genre " id="genre " value="{{ $music->genre  }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="artist_name ">Artist</label>
                        <input class="form-control" type="int" name="artist_name " id="artist_name " value="{{ $music->artist_name  }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="popularity ">Popularity</label>
                        <input class="form-control" type="int" name="popularity " id="popularity " value="{{ $music->popularity  }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="key">Key</label>
                        <input class="form-control" type="int" name="key" id="key" value="{{ $music->key }}" disabled>
                    <a href="/admin/music/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
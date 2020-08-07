@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create</h1>
                <form action="/admin/videogames/create" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="platform">Platform</label>
                        <input class="form-control" type="text" name="platform" id="platform">
                    </div>
                    <div class="form-group">
                        <label for="developer">Developer</label>
                        <input class="form-control" type="text" name="developer" id="developer">
                    </div>
                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <input class="form-control" type="text" name="publisher" id="publisher">
                    </div>
                    <div class="form-group">
                        <label for="release_date">Release Date</label>
                        <input type="number" name="release_date" id="release_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="user_score">User Score</label>
                        <input type="number" name="user_score" id="user_score" class="user_score">
                    </div>
                    <a href="/admin/videogames/" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
                    <button type="submit" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Create</>
                    </form>
            </div>
        </div>
    </div>
@endsection
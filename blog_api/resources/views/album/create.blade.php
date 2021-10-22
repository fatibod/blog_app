@extends('layout')
@section('dashboard-content')
    <h1>Create Album Form</h1>

    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong>{{ (Session::get('success')) }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden=true>&times;</span>
            </button>
        </div>
    @endif

    @if (Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong>{{ (Session::get('failed')) }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden=true>&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ URL::to('post-album-form')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="albumName">Album Name</label>
            <input type="text" class="form-control mt-3" id="albumName" name="albumName"aria-describedby="emailHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="albumArtista">Album Artist</label>
            <input type="text" class="form-control mt-3" id="albumArtista" name="albumArtista"aria-describedby="emailHelp" placeholder="Enter artist">
        </div>
        <div class="form-group">
            <label for="albumGenero">Album Genere</label>
            <input type="text" class="form-control mt-3" id="albumGenero" name="albumGenero"aria-describedby="emailHelp" placeholder="Enter genere">
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@stop
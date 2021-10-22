@extends('layout')
@section('dashboard-content')
    <h1>Edit Album Form</h1>

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

    <form action="{{ URL::to('update-album-form')}}/{{$album->id}}" method="get">
        @csrf
        <div class="form-group">
            <label for="albumName">Technology Name</label>
            <input value="{{ $album->name }}" type="text" class="form-control mt-3" id="albumName" name="albumName"aria-describedby="emailHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="albumArtista">Technology Description</label>
            <input value="{{ $album->description }}" type="text" class="form-control mt-3" id="albumArtista" name="albumArtista"aria-describedby="emailHelp" placeholder="Enter Artist">
        </div>
        <div class="form-group">
            <label for="albumGenero">Technology Type</label>
            <input value="{{ $album->type }}" type="text" class="form-control mt-3" id="albumGenero" name="albumGenero"aria-describedby="emailHelp" placeholder="Enter Genere">
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@stop
@extends('layout')
@section('dashboard-content')
    <h1>Create Thing Form</h1>

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

    <form action="{{ URL::to('post-thing-form')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="thingName">Thing Name</label>
            <input type="text" class="form-control mt-3" id="thingName" name="thingName"aria-describedby="emailHelp" placeholder="Enter name">
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@stop
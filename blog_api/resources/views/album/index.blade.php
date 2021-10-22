@extends('layout')

@section('dashboard-content')


@if (Session::get('deleted'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
        <strong>{{ (Session::get('deleted')) }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden=true>&times;</span>
        </button>
    </div>
@endif

@if (Session::get('delete-failed'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
        <strong>{{ (Session::get('delete-failed')) }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden=true>&times;</span>
        </button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Table Example
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%">
                <thead class="thead">
                    <tr>
                    <th scope="col">Name Album</th>
                    <th scope="col">Artist</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($albums as $albumes)
                        <tr>
                            <td>{{$albumes->name}}</td>
                            <td>{{$albumes->description}}</td>
                            <td>{{$albumes->type}}</td>
                            <td>
                                <a href="{{ URL::to('edit-album') }}/{{$albumes->id}}" class="btn btn-success">Edit</a>
                                |
                                <a href="{{ URL::to('delete-album') }}/{{$albumes->id}}" class="btn btn-danger" onclick="return checkDelete()">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<script>
    function checkDelete(){
        var check = confirm("Are you sure you want to delete this?");
        if(check){
            return true;
        }
        return false;
    }
</script>

@stop
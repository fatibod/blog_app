@extends('layout')

@section('dashboard-content')


@if (Session::get('destroy'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
        <strong>{{ (Session::get('destroy')) }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden=true>&times;</span>
        </button>
    </div>
@endif

@if (Session::get('destroy-failed'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
        <strong>{{ (Session::get('destroy-failed')) }}</strong>
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
            <table class="table table-bordered table-striped" id="dataTable" width="100" height="100">
                <thead class="thead">
                    <tr>
                    <th scope="col">Blog Title</th>
                    <th scope="col">Blog Details</th> 
                    <th scope="col"> Blog Category</th>
                    <th scope="col">Blog Featured Image</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogPosts as $blogPost)
                        <tr>
                            <td>{{$blogPost->title}}</td>
                            <td>{{$blogPost->details}}</td>
                            <td>{{$blogPost->category->name}}</td>
                    
                            <td><img src="{{$blogPost->featured_image_url}}" widht="100" height="100"/></td>
                            <td>
                                <a href="{{ URL::to('edit-blog-post') }}/{{$blogPost->id}}" class="btn btn-success">Edit</a>
                                |
                                <a href="{{ URL::to('delete-blog-post') }}/{{$blogPost->id}}" class="btn btn-danger" onclick="return checkDelete()">Delete</a>
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
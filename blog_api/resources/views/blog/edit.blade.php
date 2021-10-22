@extends('layout')
@section('dashboard-content')
    <h1>Edit Blog Post Form</h1>

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

    <form action="{{ URL::to('update-blog-post')}}/{{ $blogPost->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="blogTitle">Blog title</label>
            <input type="text" class="form-control mt-3" id="blogTitle" 
            name="blogTitle"aria-describedby="emailHelp"
            value="{{$blogPost->title}}" placeholder="Enter blog title">
        </div>

        <div class="form-group">
            <label for="blogDetails">Blog details</label>
            <textarea class="form-control"     id="blogDetails" 
            name="blogDetails" value="{{$blogPost->details}}"></textarea>
        </div>

        <div class="form-group">
            <label for="Category">Select a Post Category</label>
            <select type="text" class="form-control mt-3"  name="Category"aria-describedby="emailHelp">
                <option>Select one</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if($category->id == $blogPost->category_id) selected @endif> {{$category->name}}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="featuredPhoto">Select featured photo:</label>
            <input type="file" name="featuredPhoto" 
             class="form-control" onChange="loadPhoto(event);">
        </div>

        <div>
            <img id="photo" name= "featuredPhoto" height="100" width="100" />
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
    <script>
        function loadPhoto(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('photo');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@stop
@extends('layout.backendLayout')

@section('content')
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Post</li>
        </ol>


        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Show Posts
                <a href="{{url('admin/post/create')}}" class="float-right btn btn-sm btn-dark">Add Post</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <<th>Description</th>
                            <th>Image</th>
                            <th>Full</th>
                            <th>Category</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Full</th>
                            <th>Category</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($Data as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->content}}</td>
                                <td><img src="{{ asset('images/thumbnails').'/'.$post->thumbnail }}" width="100" /></td>
                                <td><img src="{{ asset('images/fullImage').'/'.$post->image }}" width="100" /></td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{url('admin/post/'.$post->id.'/edit')}}">Update</a>
                                    <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/post/'.$post->id.'/delete')}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

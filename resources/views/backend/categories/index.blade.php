@extends('layout.backendLayout')
@section('title', $title)
@section('meta_description',$meta_description)
@section('content')
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Category</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Show Categories
                <a href="{{url('admin/categories/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($data as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->title}}</td>
                                <td>{{$cat->description}}</td>
                                <td><img src="{{ asset('images').'/'.$cat->image }}" width="100" /></td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{url('admin/categories/'.$cat->id.'/edit')}}">Update</a>
                                    <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/categories/'.$cat->id.'/delete')}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection

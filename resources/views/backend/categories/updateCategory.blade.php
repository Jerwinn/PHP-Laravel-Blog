@extends('layout.backendLayout')
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
               <i class="fas fa-table"></i> Categories
        <a href="{{url('admin/categories')}}" class="float-right btn btn-sm btn-dark">All Data</a>
             </div>
             <div class="card-body">
               <div class="table-responsive">

    @if($errors)
        @foreach($errors->all() as $error)
            <p class="text-danger">{{$error}}</p>
        @endforeach
    @endif

    @if(Session::has('success'))
        <p class="text-success">{{session('success')}}</p>
    @endif

    <form method="post" action="{{url('admin/categories/'.$data->id)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <td><input type="text" value="{{$data->title}}" name="title" class="form-control" /></td>
        </tr>
        <tr>
            <th>Detail</th>
            <td><input type="text" value="{{$data->description}}" name="description" class="form-control" /></td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                <p class="my-2"><img width="80" src="{{asset('images')}}/{{$data->image}}" /></p>
                <input type="hidden" value="{{$data->image}}" name="category_image" />
                <input type="file" name="category_image" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" class="btn btn-primary" />
            </td>
            </tr>
        </table>
            </form>
                </div>
             </div>
    </div>
</div>
@endsection

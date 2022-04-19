@extends('layout.backendLayout')
@section('content')
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('/admin/dashboard')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i> Update The Chosen Post
                <a href="{{url('admin/post')}}" class="float-right btn btn-sm btn-dark">All Data</a>
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

                    <form method="post" action="{{url('admin/post/'.$data->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <table class="table table-bordered">
                            <tr>
                                <th>Category<span class="text-danger">*</span></th>
                                <td>
                                    <select class="form-control" name="category">
                                        @foreach($cats as $cat)
                                            @if($cat->id==$data->cat_id)
                                                <option selected value="{{$cat->id}}">{{$cat->title}}</option>
                                            @else
                                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td><input type="text" value="{{$data->title}}" name="post_title" class="form-control" /></td>
                            </tr>
                            <tr>
                                <th>Thumbnail</th>
                                <td>
                                    <p class="my-2"><img width="80" src="{{asset('images/thumbnails')}}/{{$data->thumbnail}}" /></p>
                                    <input type="hidden" value="{{$data->thumbnail}}" name="post_thumbnail" />
                                    <input type="file" name="post_thumb" />
                                </td>
                            </tr>
                            <tr>
                                <th>Full Image</th>
                                <td>
                                    <p class="my-2"><img width="80" src="{{asset('images/fullImage')}}/{{$data->image}}" /></p>
                                    <input type="hidden" value="{{$data->image}}" name="post_image" />
                                    <input type="file" name="post_image" />
                                </td>
                            </tr>
                            <tr>
                                <th>Content<span class="text-danger">*</span></th>
                                <td>
                                    <textarea class="form-control" name="post_content">{{$data->detail}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Tags</th>
                                <td>
                                    <textarea class="form-control" name="post_tags">{{$data->tags}}</textarea>
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

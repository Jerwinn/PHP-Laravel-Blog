@extends('layout.frontendLayout')
@section('title','Categories')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="row mb-5">
            @if(count($categories)>0)
            @foreach($categories as $category)
            <div class="col-md-4">
                <div class="card">
                    <a href="{{url('categories/'.Str::slug($category->title).'/'.$category->id)}}"><img src="{{asset('images/'.$category->image)}}" class="card-img-top" alt="{{$category->title}}" /></a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{url('categories/'.Str::slug($category->title).'/'.$category->id)}}">{{$category->title}}</a></h5>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p class="alert alert-danger">No Category Found</p>
            @endif
        </div>
        <!-- Pagination -->
        {{$categories->links()}}
    </div>
    <!-- Sidebar -->
    <div class="col-md-4">
        <!-- Search Menu -->
        <div class="card mb-4">
            <h5 class="card-header">Search Posts</h5>
            <div class="card-body">
                <form action="{{url('/')}}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" />
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Recent posts -->
        <div class="card mb-4">
            <h5 class="card-header">Recent Posts</h5>
            <div class="list-group list-group-flush">
                @if($recentPost)
                    @foreach($recentPost as $post)
                        <a href="{{url('detail/'.Str::slug($post->title).'/'.$post->id)}}" class="list-group-item">{{$post->title}}</a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
</main>
@endsection

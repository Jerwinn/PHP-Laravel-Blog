@extends('layout.frontendLayout')
@section('title','Posts')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row mb-5">
                @if(count($posts)>0)
                    @foreach($posts as $post)
                        <div class="col-md-4">
                            <div class="card">
                                <a href="{{url('detail/'.Str::slug($post->title).'/'.$post->id)}}"><img src="{{asset('images/thumbnails/'.$post->thumbnail)}}" class="card-img-top" alt="{{$post->title}}" /></a>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{url('detail/'.Str::slug($post->title).'/'.$post->id)}}">{{$post->title}}</a></h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="alert alert-danger">No Post Found</p>
                @endif
            </div>
            <!-- Pagination for recent posts-->
            {{$posts->links()}}
        </div>
        <!-- Menu -->
        <div class="col-md-4">
            <!-- Search -->
            <div class="card mb-4">
                <h5 class="card-header">Search Posts</h5>
                <div class="card-body">
                    <form action="{{url('/')}}">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" />
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button" id="button-addon2">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Recent Posts -->
            <div class="card mb-4">
                <h5 class="card-header">Recent Posts</h5>
                <div class="list-group list-group-flush">
                    @if($recentPost)
                        @foreach($recentPost as $post)
                            <a href="#" class="list-group-item">{{$post->title}}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection('content')

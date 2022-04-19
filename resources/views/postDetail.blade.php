@extends('layout.frontendLayout')
@section('title',$detail->title)
@section('content')
    <!-- Display post content -->
    <div class="row">
        <div class="col-md-8">
            @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="card">
                <h5 class="card-header">
                    {{$detail->title}}
                </h5>
                <img src="{{asset('images/fullImage/'.$detail->image)}}" class="card-img-top" alt="{{$detail->title}}">
                <div class="card-body">
                    {{$detail->content}}
                </div>
                <div class="card-footer">
                    <span class="float-right">{{$detail->views}} Views</span>
                </div>
            </div>
            @auth
                <!-- Add Comments -->
                    <div class="card my-5">
                        <h5 class="card-header">Add Comment</h5>
                        <div class="card-body">
                            <form method="post" action="{{url('comment/'.Str::slug($detail->title).'/'.$detail->id)}}">
                                @csrf
                                <textarea name="comment" class="form-control"></textarea>
                            <input type="submit" class="btn btn-dark mt-2"/>
                        </div>
                    </div>
                    @endauth
                <!-- Get Existing Comments -->
                <div class="card my-4">
                    <h5 class="card-header">Comments <span class="badge badge-dark">{{count($detail->comments)}}</span></h5>
                    <div class="card-body">
                        @if($detail->comments)
                            @foreach($detail->comments as $comment)
                                <blockquote class="blockquote">
                                    <p class="mb-0">{{$comment->comment}}</p>
                                    @if($comment->user_id==0)
                                        <footer class="blockquote-footer">Admin</footer>
                                    @else
                                        <footer class="blockquote-footer">{{$comment->user->name}}</footer>
                                    @endif
                                </blockquote>
                                <hr/>
                            @endforeach
                        @endif
                    </div>
                </div>
        </div>
    </div>
@endsection('content')

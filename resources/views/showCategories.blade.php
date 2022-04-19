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
        {{$categories->links()}}

</div>
@endsection('content')

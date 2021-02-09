@extends('layouts.app')
@section('content')
    @foreach($posts as $post)
        <ul>
            <li>
                <a href='{{route("posts.show", ["post"=>$post->id])}}'>{{$post->title}}<br>
                {{$post->body}}</a>
            </li>
        </ul>
    @endforeach

@endsection
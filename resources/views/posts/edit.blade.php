@extends('layouts.app')

@section('content')

<h1>edit form</h1>
<form method="POST" action="/posts/{{$post->id}}">
    @csrf
    <input type="hidden" name="_method" value="PUT" >
    <input type="text" name="title" value="{{$post->title}}">
    <input type="text" name="body" value="{{$post->body}}">
    
    <input type="submit" name ="submit" value="update">
</form>
<form method="post" action="/posts/{{$post->id}}">
@csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" name ="submit" value="delete">
    
</form>
@stop
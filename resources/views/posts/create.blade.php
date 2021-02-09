@extends('layouts.app')

@section('content')
<form method="post" action="/posts">
    @csrf
    <input type="text" name="title" placeholder="enter name">
    <input type="text" name="body" placeholder="enter body">
    
    <input type="submit" name ="submit">
</form>
@stop
@extends('layouts.app')

@section('title')
    contact us
@stop
@section('contant')
    <h1>contact page</h1>
    {{ $name or 'Default' }}
    @if(count($people))
        <ul>
            @foreach($people as $person)
                <li>{{$person}}</li>
            @endforeach
        </ul>
    @endif
@stop

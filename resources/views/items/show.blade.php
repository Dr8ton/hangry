@extends('layout.app')  

@section('content')
    <h1>{{$item->title}}</h1>
    <small>Written on {{$item->created_at}}</small>
@endsection
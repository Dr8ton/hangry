@extends('layouts.app')

@section('content')
    <h1>Items</h1>
    @if(count($items) > 1)
        @foreach($items as $item)
            <div class="well">
                <h3><a href="/items/{{$item->id}}">{{$item->title}}</h3></a>
            <small>Written on {{$item->created_at}}</small>
            </div>
            <hr>
        @endforeach
    @else
            <p>No items found</p>
    @endif
@endsection
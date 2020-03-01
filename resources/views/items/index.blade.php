@extends('layouts.app')

@section('content')
    @if(count($items) > 0)
    <div class="list-group">

        @foreach($items as $item)
            <li class="list-group-item">{{$item->title}}
                <button class="btn btn-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Edit
                </button>
            </li>
        @endforeach
        </div>
    @else
            <p>No items found</p>
    @endif
@endsection
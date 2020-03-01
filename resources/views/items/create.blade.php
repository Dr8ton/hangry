@extends('layouts.app')

@section('content')
    <h1>Create Item</h1>
    {!! Form::open(['action' => 'ItemsController@store', 'method' => 'POST']) !!}
    
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>

    {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection
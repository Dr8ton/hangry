<div class="container text-center">
    <h1> Shopping List</h1> 
    {!! Form::open(['action' => 'ItemsController@store', 'method' => 'POST']) !!}
    
    <div class="form-group">
        {{Form::label('title','What Shall we buy?')}}
        {{Form::text('title', '', ['class' => 'form-control'])}}
    </div>

    {{Form::submit('Add to list',['class'=> 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
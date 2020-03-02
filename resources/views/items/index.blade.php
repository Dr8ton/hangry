@extends('layouts.app')

@section('content')

    @if(count($items) > 0)
    <div class="list-group">
        @foreach($items as $item)
            <li class="list-group-item">{{$item->title}}
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" data-title="{{$item->title}}" data-id="{{$item->id}}">
                    Edit                  
                </button>
            </li>
        @endforeach
    </div>
    @else
            <p>No items found</p>
    @endif

    {{-- Modal --}}

    <div class="modal" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="container text-center">
                    {!! Form::open(['action' => ['ItemsController@update', $item->id], 'method' => 'POST']) !!}
                    
                    <div class="form-group">
                        {{Form::label('title','Edit Item')}}
                        {{Form::text('title', $item->title , ['class' => 'form-control'])}}
                        {{-- //TODO:  don't want this so wide. 'wide as the google bar per the wife' --}}
                    </div>
                
                    {{Form::hidden('_method','PUT')}}

                </div>           
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              {{Form::submit('Save Changes',['class'=> 'btn btn-primary'])}}
              {!! Form::close() !!}
              {{-- <button type="submit" class="btn btn-primary">Save changes</button> --}}
            </div>
          </div>
        </div>
      </div>
    

    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget) 
            var title = button.data('title')
            console.log(title)
            var modal = $(this)

            modal.find('.modal-body #title').val(title)   
        })
    </script>  
@endsection
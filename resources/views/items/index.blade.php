@extends('layouts.app')

@section('content')

    @if(count($items) > 0)
    <div class="list-group">
        @foreach($items as $item)
            <li class="list-group-item">{{$item->title}}
                    {!!Form::open(['action' => ['ItemsController@destroy', $item->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {{Form::close()}}
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" data-item-id="{{$item->id}}" data-item-title="{{$item->title}}">Edit</button>
            </li>
        @endforeach
    </div>
    @else
            <p>No items found</p>
    @endif

{{-- Modal --}}
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {!! Form::open(['action' => ['ItemsController@update','test'], 'method' => 'POST']) !!}
            {{Form::hidden('_method','PUT')}}
              <div class="form-group">
                {{Form::label('title','Item')}}
                {{Form::text('title','', ['class' => 'form-control'])}}
                <input type="hidden" name="item-id" id="item-id" value="">

            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             
              {{Form::submit('Done',['class'=> 'btn btn-primary'])}}
              {!! Form::close() !!}
              <button type="button" class="btn btn-primary">Update item</button>
            </div>
          </div>
        </div>
      </div>

 <script>
     $('#exampleModal').on('show.bs.modal', function (event) {
         console.log('modal open');
        var button = $(event.relatedTarget) 
        var id_value = button.data('item-id') 
        var item_title = button.data('item-title') 
        var modal = $(this)
        modal.find('#item-id').val(id_value)
        modal.find('#title').val(item_title)
    })

 </script>
{{-- end modal --}}

@endsection
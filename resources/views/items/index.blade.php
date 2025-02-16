@extends('layouts.app')

@section('content')

    @if(count($items) > 0)
    <div class="list-group sort_menu">
        @foreach($items as $item)
            <li class="list-group-item" data-id="{{$item->id}}">
              <span class="handle"></span> {{$item->title}}
                    {!!Form::open(['action' => ['ItemsController@destroy', $item->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {{Form::close()}}
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#editModal" data-item-id="{{$item->id}}" data-item-title="{{$item->title}}">Edit</button>
            </li>
        @endforeach
    </div>
    @else
            <p>No items found</p>
    @endif

{{-- Modal --}}
    <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
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
            </div>
          </div>
        </div>
      </div>

{{-- end modal --}}

  <style>
        .handle {
          min-width: 18px;
          background: #607D8B;
          height: 15px;
          display: inline-block;
          cursor: move;
          margin-right: 10px;
        }

      .highlight {
        background: #f7e7d3;
        min-height: 30px;
        list-style-type: none;
      }
  </style>

 <script>
    $(document).ready(function(){

    	function updateToDatabase(idString){
    	   $.ajaxSetup({ headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}});
    		
    	   $.ajax({
              url:'{{url('/list/update-order')}}',
              method:'POST',
              data:{ids:idString}
           })
    	}

        var target = $('.sort_menu');
        target.sortable({
            handle: '.handle',
            placeholder: 'highlight',
            axis: "y",
            update: function (e, ui){
               var sortData = target.sortable('toArray',{ attribute: 'data-id'})
               updateToDatabase(sortData.join(','))
            }
        })
        
    })

     $('#editModal').on('show.bs.modal', function (event) {
         console.log('modal open');
        var button = $(event.relatedTarget) 
        var id_value = button.data('item-id') 
        var item_title = button.data('item-title') 
        var modal = $(this)
        modal.find('#item-id').val(id_value)
        modal.find('#title').val(item_title)
    })

 </script>

@endsection
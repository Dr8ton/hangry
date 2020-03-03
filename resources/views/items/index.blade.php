@extends('layouts.app')

@section('content')

    @if(count($items) > 0)
    <div class="list-group">
        @foreach($items as $item)
            <li class="list-group-item">{{$item->title}}
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
              <form action="/items/update" method="POST">
                <div class="form-group">
                  <label for="item-title" class="col-form-label">Recipient:</label>
                  <input type="text" class="form-control" id="item-title">
                  <input type="hidden" name="item-id" id="item-id" value="">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update item</button>
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
        modal.find('.modal-body #item-id').val(id_value)
        modal.find('.modal-body #item-title').val(item_title)
})
 </script>

@endsection
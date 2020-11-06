@extends('layouts.main')

@section('content')

	<div class="container">
		<h1>Welcome to the Todos List app</h1>

		<br/>

		<br/>

		<a class="btn btn-success text-white" href="{{ route('todos.create') }}">Add a Todo</a>

		@if(isset($items))
			<div class="todo-list">
				<ul class="items">
				@foreach($items as $item)
					<li data-itemID="{{ $item->id }}"><a href="{{ route('todos.show', $item->id) }}">{{ $item->title }}&nbsp;&nbsp;</a><span data-toggle="modal" data-target="#delete_modal_<?php echo $item->id; ?>" data-model="<?php echo $item->id; ?>" id="delete-button" value="Delete" style="color: #aaaaaa">x</span>
					</li>
					<div class="modal fade" id="delete_modal_<?php echo $item->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">          
                                <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete item "<?php echo $item->title; ?>"?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-val="{{ $item->id }}" class="delete_button btn btn-success" data-dismiss="modal">Yes</button>
                                <button type="button" class="btn btn-primary">No</button>
                            </div>
                        </div>
                    </div>
                </div>
				@endforeach
				</ul>

			</div>
		@endif

	</div>

	<script>

        // Variable to hold request
        var request;

        // Bind to the submit event of our form
        $(".delete_button").click(function(event){

            // Prevent default posting of form - put here to work in case of errors
            event.preventDefault();

            $('.alert-success').hide();

            var item_id = $(this).data('val');

            var item = $('li[data-itemID="' + item_id + '"]');            

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Fire off the request
            $.ajax({
                url: "/todos/" + item_id,
                type: "delete",
                dataType: "JSON",
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    "item_id": item_id
                },
                success: function (response)
                {
                        console.log('SUCCESS');
                        item.remove();
                },
                error: function(xhr) {
                        console.log('ERROR');
                }
            });

        });
    </script>

@endsection
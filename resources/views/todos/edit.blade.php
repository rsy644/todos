@extends('layouts.main')

@section('content')

	<div class="container">
		<a href="{{ route('todos.index') }}">< Back</a>
		<h1>Edit an item</h1>

		<form method="POST" role="form" enctype="multipart/form-data" action="{{route('todos.update', $item->id) }}">
		@csrf
			<div class="form-input">
				<input type="hidden" name="user_id" class="user_id" id="user_id" value="#" />
				<div class="row todo-row">
					<div class="col-sm-1">
						<label for="item">Title</label>
					</div>

					<div class="col-sm-3">
						@if(isset($item->title))
							<input type="text" id="title" name="title" class="todo-input title" value="{{ $item->title }}">
						@else
							<input type="text" id="title" name="title" class="todo-input title" value="">
						@endif			
						
					</div>
				</div>
				<div class="row todo-row">
					<div class="col-sm-1">
						<label for="description">Description</label>
					</div>

					<div class="col-sm-3">
						@if(isset($item->description))
							<textarea id="description" name="description" class="todo-input description" value="">{{ $item->description }}</textarea>
						@else
							<textarea id="description" name="description" class="todo-input description" value=""></textarea>
						@endif
					</div>
				</div>
				<div class="row todo-row">
					<div class="col-sm-1">
						<label for="reminder" name="reminder" class="reminder" value="">Reminder</label>
					</div>
					@php
						$item_date = date_create_from_format('Y-m-d H:i:s', $item->reminder);
						$date = $item_date->format('d/m/Y');
					@endphp

					<div class="col-sm-3">
						@if(isset($item->reminder))
							<input type="text" id="reminder" name="reminder" class="todo-input reminder" value="{{ $date }}">
						@else
							<input type="text" id="reminder" name="reminder" class="todo-input reminder" value="">
						@endif
					</div>
				</div>

				<input type="submit" class="btn btn-success text-white" id="submit" name="submit" value="Submit">

			</div>

		</form>
	</div>

@endsection
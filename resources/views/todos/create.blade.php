@extends('layouts.main')

@section('content')

	<div class="container">
		<a href="{{ URL::previous() }}">< Back</a>
		<h1>Create a new item</h1>

		<form method="POST" role="form" enctype="multipart/form-data" action="{{route('todos.store') }}">
		@csrf
			<div class="form-input">
				<input type="hidden" name="user_id" class="user_id" id="user_id" value="{{ $user->id }}" />
				<div class="row todo-row">
					<div class="col-sm-1">
						<label for="item">Title</label>
					</div>

					<div class="col-sm-3">
						
						<input type="text" id="title" name="title" class="todo-input title" value="">			
						
					</div>
				</div>
				<div class="row todo-row">
					<div class="col-sm-1">
						<label for="description">Description</label>
					</div>

					<div class="col-sm-3">
						<textarea id="description" name="description" class="todo-input description" value=""></textarea>
					</div>
				</div>
				<div class="row todo-row">
					<div class="col-sm-1">
						<label for="reminder" name="reminder" class="reminder" value="">Reminder</label>
					</div>

					<div class="col-sm-3">
						<input type="text" id="reminder" name="reminder" class="todo-input reminder" value="">
					</div>
				</div>

				<input type="submit" class="btn btn-success text-white" id="submit" name="submit" value="Submit">

			</div>

		</form>
	</div>

@endsection
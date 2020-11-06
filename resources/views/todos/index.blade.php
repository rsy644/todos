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
					<li><a href="{{ route('todos.show', $item->id) }}">{{ $item->title }}&nbsp;&nbsp;</a><span style="color: #aaaaaa">x</li>
				@endforeach
				</ul>
			</div>
		@endif

	</div>

@endsection
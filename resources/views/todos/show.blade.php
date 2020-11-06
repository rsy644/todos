@extends('layouts.main')

@section('content')

	<div class="container">
		<a href="{{ URL::previous() }}">< Back</a>
		<h1>{{ $item->title }}</h1>
		<a href="{{ route('todos.edit', $item->id) }}">Edit Item</a>

		<p>{{ $item->description }}</p>

		
	</div>

@endsection
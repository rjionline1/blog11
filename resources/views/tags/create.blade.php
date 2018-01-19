@extends('main')

@section('title')
	- Create Tag
@endsection

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>Create New Tag</h1>
		<hr>
		{!!Form::open(['route' => 'tags.store', 'data-parsley-validate' => ''])!!}
		{{Form::label('name', 'Tag Name:')}}
		{{Form::text('name', null, ['class' => 'form-control'])}}
		{{Form::submit('Create Tag', ['class' => 'btn btn-success btn-large btn-block form-spacing-top'])}}
		{!!Form::close()!!}
	</div>
</div>

<div class="row form-spacing-top">
	<div class="col-md-6 col-md-offset-3">
		<table class="table">
			<tr>
				<th>Tag</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			@foreach($tags as $tag)
			<tr>
				<td>{{$tag->name}}</td>
				<td><a href="{{route('tags.show', ['tag' => $tag])}}">view</a></td>
				<td><a href="{{route('tags.edit', ['tag' => $tag])}}">edit</a></td>
				<td>
					{!!Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure you want to delete?')"])!!}
					{!!Form::submit('delete', ['class' => 'btn btn-danger btn-sm'])!!}
					{!!Form::close()!!}
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

@endsection
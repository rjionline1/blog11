@extends('main')

@section('title')
	- Create New Category
@endsection

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>Create New Category</h1>
		{!!Form::open(array('route' => 'categories.store', 'data-parsley-validate' => ''))!!}
		{{Form::label('name', 'Name:')}}
		{{Form::text('name', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255'])}}
		{{Form::submit('Create New Category', ['class' => 'btn btn-success btn-large btn-block form-spacing-top'])}}
		{!!Form::close()!!}
	</div>
</div>


<div class="row form-spacing-top">
	<div class="col-md-6 col-md-offset-3">
		<table class="table">
			<tr>
				<th>Category Name</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			@foreach($categories as $category)
			<tr>
				<td>{{$category->name}}</td>
				<td><a href="{{route('categories.show', ['category' => $category])}}">view</a></td>
				<td><a href="{{route('categories.edit', ['category' => $category])}}">edit</a></td>
				<td>
					{!!Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure you want to delete?')"])!!}
					{!!Form::submit('delete', ['class' => 'btn btn-danger btn-sm'])!!}
					{!!Form::close()!!}
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

@endsection
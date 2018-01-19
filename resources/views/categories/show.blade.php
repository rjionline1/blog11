@extends('main')

@section('title')
	- Show Category
@endsection

@section('content')

<div class="row">

	<div class="col-md-6 col-md-offset-2">
		<h3>Category: {{$category->name}}</h3>
	</div>

	<div class="col-md-3 form-spacing-top">
		<div class="well">
			<dl>Created At: {{$category->created_at}}</dl>
			<dl>Updated At: {{$category->updated_at}}</dl>
			<a href="{{route('categories.create')}}" class = 'btn btn-default btn-sm'>View/Create Categories >></a>
		</div>
	</div>
</div>

@endsection
@extends('main')

@section('title')
	- {{$post->title}}
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>{{$post->title}}</h1>
		<p>{{$post->body}}</p>
		<hr>
		Posted in: {{$post->category->name}}
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		@foreach ($post->comments as $comment)
			{{$comment->comment}}
		@endforeach
	</div>
</div>
<div class="row form-spacing-top">
	<div id="comment-form">
		{{Form::open(['route' => ['comments.store', $post->id, 'method' => 'POST']])}}
			<div class="row">
				<div class="col-md-8 col-md-offset-2 form-spacing-top">
					<div class="col-md-6">
						{{Form::label('name', 'Name:')}}
						{{Form::text('name', null, ['class' => 'form-control'])}}
					</div>
					<div class="col-md-6">
						{{Form::label('email', 'Email:')}}
						{{Form::text('email', null, ['class' => 'form-control'])}}
					</div>
					<div class="col-md-12">
						{{Form::label('comment', 'Comment:')}}
						{{Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5'])}}
						{{Form::submit('Add Comment', ['class' => 'btn btn-success btn-block form-spacing-top'])}}
					</div>
				</div>
			</div>
		{{Form::close()}}
	</div>
</div>

@endsection
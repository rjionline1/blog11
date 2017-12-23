@extends('main')

@section('title')
	'- View Post'
@endsection

@section('content')
	<div class="row">
		<div class="col-md-5 col-md-offset-2">
			<h1>{{$post->title}}</h1>
			<p class="lead">{{$post->body}}</p>
		</div>
		<div class="col-md-3">
			<div class="well">
				Created At: {{date('Y-j-m g:m a', strtotime($post->created_at))}}
				<br>
				Updated At: {{date('Y-j-m g:m a', strtotime($post->updated_at))}}
				<div class="row">
					<div class="col-md-6">
						{!!Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-primary btn-block form-spacing-top'])!!}
					</div>
					<div class="col-md-6">
						{!!Html::linkRoute('posts.destroy', 'Delete', [$post->id], ['class' => 'btn btn-danger btn-block form-spacing-top'])!!}
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
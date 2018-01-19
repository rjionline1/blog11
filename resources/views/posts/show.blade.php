@extends('main')

@section('title')
	'- View Post'
@endsection

@section('content')
	<div class="row">
		<div class="col-md-5 col-md-offset-2">
			<h1>{{$post->title}}</h1>
			<p class="lead">{{$post->body}}</p>
			<hr>
			@foreach ($post->tags as $tag)
				<span class="label label-default">{{$tag->name}}</span>
			@endforeach
		</div>
		<div class="col-md-3">
			<div class="well">
				URL: <a href="{{url('blog/'.$post->slug)}}">{{url('blog/'.$post->slug)}}</a>
				<br>
				Category: {{$post->category->name}}
				<br>
				Created At: {{date('Y-j-m g:m a', strtotime($post->created_at))}}
				<br>
				Updated At: {{date('Y-j-m g:m a', strtotime($post->updated_at))}}
				<div class="row">
					<div class="col-md-6">
						{!!Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-primary btn-block form-spacing-top'])!!}
					</div>
					<div class="col-md-6">
						{!!Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure you want to delete?')"])!!}
						{!!Form::submit('Delete', ['class' => 'btn btn-danger btn-block form-spacing-top'])!!}
						{!!Form::close()!!}						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!!Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block form-spacing-top'])!!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!!Html::linkRoute('posts.create', 'Create New Post', [], ['class' => 'btn btn-success btn-block form-spacing-top'])!!}
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
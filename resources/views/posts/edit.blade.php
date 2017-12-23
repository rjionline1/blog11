@extends('main')

@section('title')
	- Edit Post
@endsection

@section('content')
	<div class="row">
		{!!Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT'])!!}
		<div class="col-md-5 col-md-offset-2">
			{{Form::label('title', 'Title:')}}
			{{Form::text('title', null, ["class" => 'form-control input-lg'])}}
			{{Form::label('body', 'Body:', ["class" => 'form-spacing-top'])}}
			{{Form::textarea('body', null, ["class" => 'form-control'])}}
		</div>
		<div class="col-md-3">
			<div class="well">
				Created At: {{date('Y-j-m g:m a', strtotime($post->created_at))}}
				<br>
				Updated At: {{date('Y-j-m g:m a', strtotime($post->updated_at))}}
				<div class="row">
					<div class="col-md-6">
						{!!Html::linkRoute('posts.show', 'Cancel', [$post->id], ['class' => 'btn btn-danger btn-block form-spacing-top'])!!}
					</div>
					<div class="col-md-6">
						{{Form::submit('Save', ['class' => 'btn btn-success btn-block form-spacing-top'])}}				
					</div>
				</div>
			</div>
		</div>
		{!!Form::close()!!}
	</div>
@endsection
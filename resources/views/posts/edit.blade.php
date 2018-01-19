@extends('main')

@section('title')
	- Edit Post
@endsection

@section('select2')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection

@section('content')
	<div class="row">
		{!!Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT'])!!}
		<div class="col-md-5 col-md-offset-2">
			{{Form::label('title', 'Title:')}}
			{{Form::text('title', null, ["class" => 'form-control input-lg'])}}
			{{Form::label('slug', 'Slug:', ['class' => 'form-spacing-top'])}}
			{{Form::text('slug', null, ['class' => 'form-control'])}}
			{{Form::label('category', 'Category:', ['class' => 'form-spacing-top'])}}
			{{Form::select('category_id', $categories, null, ['class' => 'form-control'])}}
			{{Form::label('tags', 'Tags:', ['class' => 'form-spacing-top'])}}
			{{Form::select('tags[]', $tags, null, ['class' => 'js-example-basic-multiple form-control', 'multiple' => "multiple"])}}
		      
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
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    });
 </script>
@endsection
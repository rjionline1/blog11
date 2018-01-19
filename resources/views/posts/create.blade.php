@extends('main')

@section('title')
  - Create New Post
@endsection

@section('stylesheets')
	{!!Html::style('css/parsley.css')!!}
@endsection

@section('select2')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1 class="center">Create New Post</h1>
    <hr>
    {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
    	{{Form::label('title', 'Title:')}}
    	{{Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255'])}}
      {{Form::label('slug', 'Slug:', ['class' =>  'form-spacing-top'])}}
      {{Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255'])}}
      {{Form::label('category_id', 'Category:', ['class' => 'form-spacing-top'])}}
      <select name="category_id" class="form-control">
        @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
      {{Form::label('tags', 'Tags:', ['class' => 'form-spacing-top'])}}
      <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
        @foreach($tags as $tag)
        <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
      </select>
    	{{Form::label('body', 'Message:', ['class' =>  'form-spacing-top'])}}
    	{{Form::textarea('body', null, ['class' => 'form-control', 'required' => ''])}}
    	{{Form::submit('Create Post', ['class' => 'btn btn-success btn-large btn-block form-spacing-top'])}}
    {!! Form::close() !!}
  </div>
</div>

@endsection

@section('scripts')
	{!!Html::script('js/parsley.min.js')!!}
  <script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    });
  </script>
@endsection

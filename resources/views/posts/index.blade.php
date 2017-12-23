@extends('main')

@section('title')
	- All Posts
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-2">
		<h1>All Posts</h1>
	</div>
	<div class="col-md-2">
		<a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary form-spacing-top">Create New Post</a>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<table style="width:100%" class="table table-striped">
		  <tr>
		    <th>Title</th>
		    <th>Body</th> 
		    <th>Created At</th>
		    <th>Updated At</th>
		    <th></th>
		    <th></th>
		    <th></th>
		  </tr>
		  @foreach($posts as $post)
		  <tr>
		    <td>{{$post->title}}</td>
		    <td>{{substr($post->body, 0, 50)}}{{strlen($post->body) > 10 ? "..." : ""}}</td> 
		    <td>{{$post->created_at}}</td>
		    <td>{{$post->updated_at}}</td>
		    <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-default">View</a></td>
		    <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-default">Edit</a></td>
		    <td><a href="{{route('posts.destroy', $post->id)}}" class="btn btn-sm btn-default">Delete</a></td></td>
		  </tr>
		  @endforeach
		</table>
	</div>
</div>
@endsection
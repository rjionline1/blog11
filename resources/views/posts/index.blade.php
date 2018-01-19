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
		  	<th>No.</th>
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
		  	<td>{{$post->id}}</td>
		    <td>{{$post->title}}</td>
		    <td>{{substr($post->body, 0, 50)}}{{strlen($post->body) > 50 ? "..." : ""}}</td>
		    <td>{{$post->created_at}}</td>
		    <td>{{$post->updated_at}}</td>
		    <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-default">View</a></td>
		    <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-default">Edit</a></td>
		    <td>{!!Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure you want to delete?')"])!!}
				{!!Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])!!}
				{!!Form::close()!!}</td>
		  </tr>
		  @endforeach
		</table>
		<div class="text-center">
			{!!$posts->links();!!}
		</div>
	</div>
</div>
@endsection
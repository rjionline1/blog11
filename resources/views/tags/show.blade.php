@extends('main')

@section('title')
	- Show {{$tag->name}} Tag
@endsection

@section('content')

<div class="row">

	<div class="col-md-6 col-md-offset-2">
		<h3>{{$tag->name}} Tag <small>{{$tag->posts()->count()}} 
			@if (count($tag->posts) === 1)
			    Post
			@elseif (count($tag->posts) > 1)
			    Posts</small>
			@endif</h3>
	</div>
	<div class="col-md-6 col-md-offset-2">
		<div class="row">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tags</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($tag->posts as $post)
					<tr>
						<th>{{$post->id}}</th>
						<td><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></td>
						<td>@foreach($post->tags as $tag)
							<span class='label label-default'>{{$tag->name}}</span>
						@endforeach</td>
						<td></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-3 form-spacing-top">
		<div class="well">
			<dl>Created At: {{$tag->created_at}}</dl>
			<dl>Updated At: {{$tag->updated_at}}</dl>
			<a href="{{route('tags.create')}}" class = 'btn btn-default btn-sm'>View/Create Tags</a>
		</div>
	</div>
</div>

@endsection
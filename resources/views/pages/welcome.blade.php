@extends('main')

@section('title')
 - Home
@endsection

@section('content')

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>Welcome to My Blog!</h1>
            <p>Thank you for visiting. This is my test website built with Laravel. Please read my popular post.</p>
            <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
          </div>
        </div>
      </div><!--End of Header Row-->
      <div class="row">
        <div class="col-md-8">

          @foreach($posts as $post)

          <div class="post">
            <h3>{{$post->title}}</h3>
            <p>{{substr($post->body, 0, 50)}}{{strlen($post->body) > 50 ? "..." : ""}}</p>
            <a href="{{url('blog/' . $post->slug)}}" class="btn btn-primary">Read Post</a>
          </div>
          <hr>

          @endforeach

        </div>
        <div class="col-md-3 col-md-offset-1">
          <h2>Sidebar</h2>
        </div>
      </div>
    </div><!--End of Container-->
    
    @endsection

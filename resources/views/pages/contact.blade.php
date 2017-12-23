@extends('main')

@section('title')
 - Contact
@endsection

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Contact Me</h1>
      <hr>
      <form class="" action="index.html" method="post">
        <div class="form-group">
          <label name="email">Email:</label>
          <input id="email" name="email" class="form-control">
          <label name="subject">Subject:</label>
          <input id="subject" name="subject" class="form-control">
        </div>
        <div class="form-group">
          <label name="message">Message:</label>
          <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
        </div>
        <input type="submit" class="form-control btn btn-success" value="Send Message">
      </form>
    </div>
  </div>
</div><!--End of Container-->

@endsection

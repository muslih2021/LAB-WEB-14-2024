@extends('layouts.master')

@section('title', 'Contact')

@section('content')

<section id="contact" class="container my-5">
    <h2 class="text-center mb-4">Get in Touch</h2>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form>
          <div class="mb-3">
            <label for="name" style="display: block; text-align: left;">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name">
          </div>
          <div class="mb-3">
            <label for="email" style="display: block; text-align: left;">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="message" style="display: block; text-align: left;">Message</label>
            <textarea class="form-control" id="message" rows="3" placeholder="Your message"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
      </div>
    </div>
</section>
@endsection

@extends('layouts.master')

@section('title', 'Contact')

@section('content')
<section class="contact-section py-5" id="contact">
    <div class="con-container">
      <h3 class="display-4 mb-4">Contact Us</h2>
      <form>
        <div class="mb-3">
          <label for="name" class="form-label"></label>
          <input
            type="text"
            class="form-control"
            id="name"
            placeholder="Your Name"
          />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label "></label>
          <input
            type="email"
            class="form-control"
            id="email"
            placeholder="name@example.com"
          />
        </div>
        <div class="mb-3">
          <label for="message" class="form-label "></label>
          <textarea
            class="form-control"
            id="message"
            rows="4"
            placeholder="Your message..."
          ></textarea>
        </div>
        <a><x-button url="" label="Send Message" /></a>
      </form>
    </div>
  </section>
@endsection
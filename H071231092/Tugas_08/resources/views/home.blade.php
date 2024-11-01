@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div>
    <img src="{{ URL('images\CapyBara_Go.jpeg') }}" alt="" style="height: 400px;">
    <h1>Welcome to Capybara Go!</h1>
    <x-button title="About"  message="Find out more about us on the About page."/>
    </div>
@endsection
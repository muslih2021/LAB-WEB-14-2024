@extends('layouts.base')

@section('title', 'Contact')

@section('content')
    <h1>Ini adalah halaman Contact</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Full Name</label>
            <input
                type="text"
                class="form-control"
                name=""
                id=""
                aria-describedby="full_name"
                placeholder=""
            />
            <small id="full_name" class="form-text text-muted">Help</small>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email Address</label>
            <input
                type="text"
                class="form-control"
                name=""
                id=""
                aria-describedby="email"
                placeholder=""
            />
            <small id="email" class="form-text text-muted">Help</small>
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Message</label>
            <input
                type="textarea"
                class="form-control form-control-sm"
                name=""
                id=""
                aria-describedby="message"
                placeholder=""
            />
            <small id="message" class="form-text text-muted">Help</small>
        </div>
        
        <input
            name=""
            id=""
            class="btn btn-primary"
            type="submit"
            value="Submit"
        />
        
    </form>
@endsection
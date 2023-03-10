@extends('frontend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'J1NNBlog - Contact')
@section('content')

    @if (Session::get('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
      </div>
  @endif

<div class="row">
    <div class="col-12">
        <div class="breadcrumbs mb-4"> <a href="/">Home</a>
            <span class="mx-1">/</span>  <a href="#!">Contact</a>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="pr-0 pr-lg-4">
            <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labor.
                <div class="mt-5">
                    <p class="h3 mb-3 font-weight-normal"><a class="text-dark" href="mailto:jinnapat.ch10@gmail.com">{{ blogInfo()->blog_email }}</a>
                    </p>
                    <p class="mb-3"><a class="text-dark" href="tel:+66917908845">0917908845</a>
                    </p>
                    <p class="mb-2">214/88 Thungsukha, Sriracha, Chonburi, Thailand 20230</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mt-4 mt-lg-0">
        <form method="POST" action="{{ route('send_message') }}" class="row">
            @csrf
            <div class="col-md-6">
                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                <input type="text" class="form-control mb-4" placeholder="Name" name="name" id="name">
            </div>
            <div class="col-md-6">
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                <input type="email" class="form-control mb-4" placeholder="Email" name="email" id="email">
            </div>
            <div class="col-12">
                <span class="text-danger">@error('subject'){{ $message }}@enderror</span>
                <input type="text" class="form-control mb-4" placeholder="Subject" name="subject" id="subject">
            </div>
            <div class="col-12">
                <span class="text-danger">@error('message'){{ $message }}@enderror</span>
                <textarea name="message" id="message" class="form-control mb-4" placeholder="Type You Message Here" rows="5"></textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-outline-primary" type="submit">Send Message</button>
            </div>
        </form>
    </div>
</div>
    
@endsection
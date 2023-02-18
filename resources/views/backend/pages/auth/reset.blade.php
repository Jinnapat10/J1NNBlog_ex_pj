@extends('backend.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Reset Password')
@section('content')

<div class="page page-center">
    <div class="container-tight py-4">
      <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"><img src="./backend/dist/img/logo-favicon/logo.svg" height="55" alt=""></a>
      </div>

      @livewire('author-reset-form')

    </div>
</div>

@endsection
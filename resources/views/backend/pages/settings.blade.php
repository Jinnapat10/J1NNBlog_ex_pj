@extends('backend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Settings')
@section('content')

    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">
                Settings
            </h2>
        </div>
    </div>

    <div class="card">
        <ul class="nav nav-tabs" data-bs-toggle="tabs">
          <li class="nav-item">
            <a href="#tabs-home-17" class="nav-link active" data-bs-toggle="tab">General Settings</a>
          </li>
          {{-- <li class="nav-item">
            <a href="#tabs-profile-17" class="nav-link" data-bs-toggle="tab">Logo & Favicon</a>
          </li> --}}
          <li class="nav-item">
            <a href="#tabs-activity-17" class="nav-link" data-bs-toggle="tab">Social Media</a>
          </li>
        </ul>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="tabs-home-17">
              <div>
                @livewire('author-general-settings')
              </div>
            </div>
            {{-- <div class="tab-pane fade" id="tabs-profile-17">
              <div>
                <div class="row">
                  <div class="col-md-6">
                    <h3>Set blog logo</h3>
                    <div class="mb-2" style="max-width: 200px">
                      <img src="" alt="" class="img-thumbnail" id="logo-image-preview" data-ijabo-default-img="{{ \App\Models\Setting::find(1)->blog_logo }}">
                    </div>
                    <form action="{{ route('author.change-blog-logo') }}" method="post" id="changeBlogLogoForm">
                      @csrf
                      <div class="mb-2">
                        <input type="file" name="blog_logo" class="form-control">
                      </div>
                      <button class="btn btn-primary">Change logo</button>
                    </form>
                  </div>
                  <div class="col-mb-6"></div>
                </div>
              </div>
            </div> --}}
            <div class="tab-pane fade" id="tabs-activity-17">
              <div>
                @livewire('author-blog-social-media-form')
              </div>
            </div>
          </div>
        </div>
    </div>
    
@endsection


@extends('frontend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'J1NNBlog - Blogs')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="breadcrumbs mb-4"> <a href="/">Home</a>
                <span class="mx-1">/</span> <a href="#!">Blogs</a>
            </div>
            <h1 class="mb-4 border-bottom border-primary d-inline-block">Blogs</h1>
        </div>
        <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="row">
                @foreach ($posts as $item)
                    <div class="col-md-6 mb-4">
                        <article class="card article-card article-card-sm h-100">
                            <a href="{{ route('read_post', $item->postID) }}">
                                <div class="card-image">
                                    <div class="post-info"> <span
                                            class="text-uppercase">{{ date_formatter($item->created_at) }}</span>
                                        <span
                                            class="text-uppercase">{{ readDuration($item->post_title, $item->post_content) }}
                                            @choice('min|mins', readDuration($item->post_title, $item->post_content)) read</span>
                                    </div>
                                    <img loading="lazy" decoding="async"
                                        src="/storage/images/post_images/{{ $item->featured_image }}" alt="Post Thumbnail"
                                        class="w-100" width="420" height="280">
                                </div>
                            </a>
                            <div class="card-body px-0 pb-0">
                                {{-- <ul class="post-meta mb-2">
                                    <li> <a href="#!">travel</a>
                                        <a href="#!">news</a>
                                    </li>
                                </ul> --}}
                                <h2><a class="post-title" href="{{ route('read_post', $item->postID) }}">{{ $item->post_title }}</a>
                                </h2>
                                <p class="card-text">{!! Str::ucfirst(words($item->post_content, 12)) !!}</p>
                                <div class="content"> <a class="read-more-btn" href="{{ route('read_post', $item->postID) }}">Read
                                        Full Article</a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="col-12">
                {{ $posts->appends(request()->input())->links('custom_pagination') }}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="widget-blocks">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget">
                            <div class="widget-body">
                                <img loading="lazy" decoding="async" src="{{ ProfileAuthor()->picture }}" alt="About Me"
                                    class="w-100 author-thumb-sm d-block">
                                <h2 class="widget-title my-3">{{ ProfileAuthor()->name }}</h2>
                                <p class="mb-3 pb-2">{{ ProfileAuthor()->biography }}</p> <a
                                    href="{{ route('about_me') }}" class="btn btn-sm btn-outline-primary">Know More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="widget">
                            <h2 class="section-title mb-3">Latest posts</h2>
                            <div class="widget-body">
                                <div class="widget-list">
                                    @foreach (latest_sidebar_posts() as $item)
                                    <a class="media align-items-center" href="{{ route('read_post',$item->postID) }}">
                                        <img loading="lazy" decoding="async" src="/storage/images/post_images/{{ $item->featured_image }}"
                                        alt="Post Thumbnail" class="w-100">
                                        <div class="media-body ml-3">
                                            <h3 style="margin-top:-5px">{{ $item->post_title }}</h3>
                                            <p class="mb-0 small">{!! Str::ucfirst(words($item->post_content, 10)) !!}</p>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (all_tags() != null)
                    @php
                        $allTagsString = all_tags();
                        $allTagsArray = explode(',',$allTagsString);
                    @endphp
                    <div class="col-lg-12 col-md-6">
                        <div class="widget">
                            <h2 class="section-title mb-3">Tags</h2>
                            <div class="widget-body">
                                <ul class="widget-list">
                                    @foreach(array_unique($allTagsArray) as $tag)
                                    <li><a href="{{ route('tag_posts',$tag) }}">#{{ $tag }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

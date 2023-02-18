@extends('frontend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'J1NNBlog')
@section('content')

    <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0">
            <article>
                <img loading="lazy" decoding="async" src="/storage/images/post_images/{{ $post->featured_image }}" alt="Post Thumbnail" class="w-100">
                <ul class="post-meta mb-2 mt-4">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            style="margin-right:5px;margin-top:-4px" class="text-dark" viewBox="0 0 16 16">
                            <path d="M5.5 10.5A.5.5 0 0 1 6 10h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"></path>
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z">
                            </path>
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z">
                            </path>
                        </svg> <span>{{ date_formatter($post->created_at) }}</span>
                    </li>
                </ul>
                <h1 class="my-3">{{ $post->post_title }}</h1>
                @if ($post->post_tags)
                    @php
                        $tagsString = $post->post_tags;
                        $tagsArray = explode(',',$tagsString);
                    @endphp
                <ul class="post-meta mb-4">
                    @foreach($tagsArray as $tag)
                    <li><a href="{{ route('tag_posts',$tag) }}">#{{ $tag }}</a></li>
                    @endforeach
                </ul>
                @endif
                <div class="content text-left">
                    <p>{!! $post->post_content !!}</p>
                </div>
            </article>

            @if( count($related_posts) > 0 )
            <div class="widget-list mt-5">
                <h2 class="mb-2">Related posts</h2>
                @foreach ($related_posts as $item)
                <a class="media align-items-center" href="{{ route('read_post',$item->postID) }}">
                    <img loading="lazy" decoding="async" src="/storage/images/post_images/{{ $item->featured_image }}" alt="Post Thumbnail" class="w-100">
                    <div class="media-body ml-3">
                        <h3 style="margin-top:-5px">{{ $item->post_title }}</h3>
                        <p class="mb-0 small">{!! Str::ucfirst(words($item->post_content, 25)) !!}</p>
                    </div>
                </a>
                @endforeach
            </div>
            @endif
            <div class="mt-5">
                
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
                                    href="{{ route('about_me') }}" class="btn btn-sm btn-outline-primary">Know
                                    More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="widget">
                            <h2 class="section-title mb-3">Latest posts</h2>
                            <div class="widget-body">
                                <div class="widget-list">
                                    @foreach (latest_sidebar_posts($post->id) as $item)
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

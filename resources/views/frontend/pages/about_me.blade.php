@extends('frontend.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'J1NNBlog - About Me')
@section('content')

    <div class="row">
        <div class="col-lg-8 ">
            <div class="breadcrumbs mb-4"> <a href="/">Home</a>
                <span class="mx-1">/</span> <a href="#!">About Me</a>
            </div>
        </div>
        <div class="col-lg-10 mx-auto mb-5 mb-lg-0">
            <img loading="lazy" decoding="async" src="{{ ProfileAuthor()->picture }}" class="img-fluid w-100 mb-4"
                style="object-fit: cover; height: 600px;" alt="Author Image">
            {{-- <img loading="lazy" decoding="async" src="/frontend/images/S__40722447.jpg" class="img-fluid w-100 mb-4" alt="Author Image"> --}}
            <h1 class="mb-4">{{ ProfileAuthor()->name }}</h1>
            <div class="content">
                <p>{{ ProfileAuthor()->biography }}</p>
                <blockquote>
                    <p>Don’t cry because it’s over, smile because it happened.</p>
                </blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam nihil enim maxime corporis cumque totam
                    aliquid nam sint inventore optio modi neque laborum officiis necessitatibus, facilis placeat pariatur!
                    Voluptatem, sed harum pariatur adipisci voluptates voluptatum cumque, porro sint minima similique magni
                    perferendis fuga! Optio vel ipsum excepturi tempore reiciendis id quidem.</p>
                <div class="col-12">
                    <h3 class="mb-4">Follow Me :</h3>
                    <div class="follow-socials">
                        <a href="{{ FollowMe()->bsm_facebook }}" class="fb"><i class="icons8-facebook"></i></a>
                        <a href="{{ FollowMe()->bsm_instagram }}" class="inst"><i class="icons8-instagram"></i></a>
                        <a href="{{ FollowMe()->bsm_twitter }}" class="twt"><i class="icons8-twitter"></i></a>
                        <a href="{{ FollowMe()->bsm_github }}" class="gh">
                            <i class="icons8-github"></i>
                        </a>
                    </div>
                </div>
                {{-- //////// --}}
            </div>
        </div>
    </div>

@endsection

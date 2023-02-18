<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; //222
use App\Models\User;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function pagePosts(Request $request) {
        $posts = Post::orderBy('created_at','desc')->paginate(6); //222

        $data = [
            'posts' => $posts
        ];

        return view('frontend.pages.page_posts',$data); //111
    }

    public function searchBlog(Request $request) {
        $query = request()->query('query');
        if ($query && strlen($query) >= 2) {
            $searchValues = preg_split('/\s+/', $query, -1, PREG_SPLIT_NO_EMPTY);
            $posts = Post::query();

            $posts->where(function($q) use ($searchValues){
                foreach($searchValues as $value){
                    $q->orWhere('post_title','LIKE',"%{$value}%");
                    $q->orWhere('post_tags','LIKE',"%{$value}%");
                }
            });
            $posts = $posts->with('postID')->orderBy('created_at','desc')->paginate(6);
            $data = [
                'pageTitle' => 'Search for :: '.request()->query('query'),
                'posts' => $posts
            ];

            return view('frontend.pages.search_posts',$data);
        } else {
            return abort(404); //You can also redirect back to search page with error message
        }
        
    }

    public function AboutMe(Request $request) {
        $users = User::find(1);

        $data = [
            'users' => $users
        ];

        return view('frontend.pages.about_me',$data); //about me
    }

    public function readPost($postID) {
        if (!$postID) {
            return abort(404);
        } else {

            $post = Post::where('id',$postID)->first();

            //222
            $post_tags = explode(',',$post->post_tags);
            $related_posts = Post::where('id','!=',$post->id)
                                ->where(function($query) use ($post_tags,$post){
                                    foreach ($post_tags as $item) {
                                        $query->orWhere('post_tags','like',"%$item%")
                                              ->orWhere('post_title','like',$post->post_title);
                                    }
                                })
                                ->inRandomOrder()->take(3)->get();

            $data = [
                'pageTitle' => Str::ucfirst($post->post_title),
                'post' => $post,
                'related_posts' => $related_posts //222
            ];
            
            return view('frontend.pages.read_post',$data);
        }
    }

    public function tagPosts(Request $request, $tag){
        $posts = Post::where('post_tags','like','%'.$tag.'%')
                     ->with('postID')
                     ->orderBy('created_at','desc')
                     ->paginate(6);
        
        if (!$posts) {
        return abort(404);
        }
        
        $data = [
            'pageTitle' => '#'.$tag,
            'posts' => $posts
        ];

        return view('frontend.pages.tag_posts',$data);
    }
    
}

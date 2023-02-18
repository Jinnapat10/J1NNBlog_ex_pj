<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //
use App\Models\User; // change picture
use Illuminate\Support\Facades\File; // change picture
use App\Models\Post; // add post
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image; // thumbnail

class AuthorController extends Controller
{
    public function index(Request $request) {
        return view('backend.pages.home');
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }

    public function ResetForm(Request $request, $token = null) {
        $data = [
            'pageTitle' => 'Reset Password'
        ];
        return view('backend.pages.auth.reset', $data)->with(['token'=>$token, 'email'=>$request->email]);
    }

    public function changeProfilePicture(Request $request) { //change picture
        $user = User::find(auth('web')->id());
        $path = 'backend/dist/img/authors/';
        $file = $request->file('file');
        $old_picture = $user->getAttributes()['picture'];
        $file_path = $path.$old_picture;
        $new_picture_name = 'AIMG'.$user->id.time().rand(1,100000).'.jpg';

        if ($old_picture != null && File::exists(public_path($file_path))) {
            File::delete(public_path($file_path));
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if ($upload) {
            $user->update([
                'picture' => $new_picture_name
            ]);
            return response()->json(['status'=>1, 'msg'=>'Your profile picture has been successfully updated.']);
        }else {
            return response()->json(['status'=>0, 'Something went wrong']);
        }
    }

    public function createPost(Request $request) {
        $request->validate([
            'post_title' => 'required|unique:posts,post_title',
            'post_content' => 'required',
            'featured_image' => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('featured_image')) {
            $path = "images/post_images/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time().'_'.$filename;

            $upload = Storage::disk('public')->put($path.$new_filename, (string) file_get_contents($file));

            // // thumbnail
            // $post_thumbnails_path = $path.'thumbnails';
            // if (!Storage::disk('public')->exists($post_thumbnails_path)) {
            //     Storage::disk('public')->makeDirectory($post_thumbnails_path, 0755, true, true);
            // }
            // // create square thumbnail
            // Image::make( storage_path('app/public/'.$path.$new_filename) )
            //         ->fit(200, 200)
            //         ->save( storage_path('app/public/'.$path.'thumbnails/'.'thumb_'.$new_filename));
            // // create resized image
            // Image::make( storage_path('app/public/'.$path.$new_filename) )
            //         ->fit(500, 350)
            //         ->save( storage_path('app/public/'.$path.'thumbnails/'.'resized_'.$new_filename));

            if ($upload) {
                $post = new Post();
                $post->post_title = $request->post_title;
                $post->post_content = $request->post_content;
                $post->featured_image = $new_filename;
                $post->post_tags = $request->post_tags;
                $saved = $post->save();

                if ($saved) {
                    return response()->json(['code'=>1,'msg'=>'New post has been successfully created.']);
                } else {
                    return response()->json(['code'=>3,'msg'=>'Something went wrong ins saving post data.']);
                }
                
            } else {
                return response()->json(['code'=>3,'msg'=>'Something went wrong for uploading featured image.']);
            }
            
        }
    }

    public function editPost(Request $request) {
        if (!request()->post_id) {
            return abort(404);
        } else {
            $post = Post::find(request()->post_id);
            $data = [
                'post' => $post,
                'pageTitle' => 'Edit Post',
            ];
            return view('backend.pages.edit_post', $data);
        } 
    }

    public function updatePost(Request $request) {
        if ( $request->hasFile('featured_image')) {

            $request->validate([
                'post_title' => 'required|unique:posts,post_title,'.$request->post_id,
                'post_content' => 'required',
                'featured_image' => 'mimes:jpg,jpeg,png',
            ]);

            $path = "images/post_images/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time().'_'.$filename;

            $upload = Storage::disk('public')->put($path.$new_filename, (string) file_get_contents($file));

            if ($upload) {
                $old_post_image = Post::find($request->post_id)->featured_image;

                if ($old_post_image != null && Storage::disk('public')->exists($path.$old_post_image)) {
                    Storage::disk('public')->delete($path.$old_post_image);
                }

                $post = Post::find($request->post_id);
                $post->post_title = $request->post_title;
                $post->post_content = $request->post_content;
                $post->featured_image = $new_filename;
                $post->post_tags = $request->post_tags;
                $saved = $post->save();

                if ($saved) {
                    return response()->json(['code'=>1,'msg'=>'Post has been successfully updated.']);
                } else {
                    return response()->json(['code'=>3,'msg'=>'Something went wrong for updating post.']);
                }

            } else {
                return response()->json(['code'=>3, 'msg'=>'Error in uploading new featured image.']);
            }

        } else {
            $request->validate([
                'post_title' => 'required|unique:posts,post_title,'.$request->post_id,
                'post_content' => 'required'
            ]);

            $post = Post::find($request->post_id);
            $post->post_title = $request->post_title;
            $post->post_content = $request->post_content;
            $post->post_tags = $request->post_tags;
            $saved = $post->save();
            
            if ($saved) {
                return response()->json(['code'=>1, 'msg'=>'Post has been successfully updated.']);
            } else {
                return response()->json(['code'=>3, 'msg'=>'Something went erong for updating post.']);
            }
            
        }
    }
}

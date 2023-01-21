<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class ProfileController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index($user)
    {
        $id = Auth::user()->id;
        // dd($id);exit;
        $user = User::findOrFail($user);
        
        $profile = Profile::where('user_id',$user->id)->first();
        
        $post = DB::table("posts")->where("user_id", "=", $user->id)->get();
        
        $followers = DB::table("profile_user")->where("user_id", "=", $id)->where("profile_id", "=", $user->id)->first();
        
        if(empty($profile->image)){
            
            $profile->image = '/storage/profile/5mAfDtuQTs7npuYKvTUpIB2ahBJjPbM6BErBh8lB.png';
            
        }
        else{
            $profile->image = '/storage/'.$profile->image;
        }
        
        return view('profiles.index',[
            'user' => $user,
            'profile' => $profile,
            'post' => $post,
            'C_userId' => $id,
            'followers' => $followers,
            'noimage'   => '/storage/profile/5mAfDtuQTs7npuYKvTUpIB2ahBJjPbM6BErBh8lB.png'
        ]);        
        
    }
    public function edit($user)
    {
        // $this->authorize('update', $user->profile); //403 THIS ACTION IS UNAUTHORIZED.

        $user = User::findOrFail($user);
        $profile = Profile::where('user_id',$user->id)->first();
        
        // return view('profiles.edit', compact('user'));
        return view('profiles.edit',[
            'user' => $user,
            'profile' => $profile
        ]); 
    }
    public function update(Request $user)
    {
        
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        // $imagePath = request('image')->store('profile', 'public'); 
        
        if(request('image'))
        {                       
            $imagePath = request('image')->store('profile', 'public');
            // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            // $image->save();
        }
        if(empty(request('image')))
        {
            $imagePath = '';
        } 
        
        $data = Profile::find($user->id); 
        $data->title=$user->title;
        $data->description=$user->description;
        $data->url=$user->url;
        $data->image=$imagePath;
        $data->save();

        // dd(array_merge(
        //     $data,
        //     [
        //         'image' => $imagePath,
        //     ]
        // ));exit;
        // auth()->user->profiles()->update(array_merge(
        //     $data,
        //     [
        //         'image' => $imagePath,
        //     ]
        // ));

        return redirect("/profile/{$user->id}");
    }
}

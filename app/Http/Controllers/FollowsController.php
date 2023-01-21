<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user)
    {
                
        // $username = $user->username;
        // $userId = Auth::id();
        $userId = $user->id;
        // return [$username];
        // return auth()->user()->following()->toggle($user->profile());
        // $customer=new Profile;
        // $customer->profile_id=$user->id;
        // $customer->save();
        // auth()->user()->profile_user()->create([
        //     'profile_id' => $user->id,
        //     'user_id' => $userId,
        // ]);
        // SELECT * FROM `profile_user` WHERE profile_id=1 AND user_id=1
        // $InsId=DB::table("profile_user")->where('profile_id','=',$user->id AND 'user_id','=',$userId)->get();
        // return [$InsId];
        $followers = DB::table("profile_user")->where("user_id", "=", Auth::id())->where("profile_id", "=", $user->id)->first();
        
        if(!empty($followers))
        {
            
            if(!empty($followers->title == 'Unfollow'))
            {
                
                $follows = DB::table("profile_user")->where("profile_id","=",$userId)->update([
                    
                    'title' => 'Follow'
                ]);
                
            }
            else if(!empty($followers->title == 'Follow'))
            {
                $follows = DB::table("profile_user")->where("profile_id","=",$userId)->update([
                    
                    'title' => 'Unfollow'
                ]);
            }
        }
        
        else
        {
            $follows = DB::table("profile_user")->insert([
                'profile_id' => $user->id,
                'user_id' => Auth::id(),   //Auth user
                'title' => 'Follow'
            ]);
        }
        
        // return view('profiles.index',[
        //     'follows' => $follows
        // ]); 
        return [$follows];
        // dd('aaa');
    }
}

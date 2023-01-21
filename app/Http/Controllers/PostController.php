<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Intervention\Image\Facades\Image as Image;
use Excel;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {        
        return view('posts.create');
    }
    public function store()
    {
        // $userId = Auth::id();
        $data = request()->validate([            
            'caption' => ['required'],
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        // $image->save();
        
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        return redirect('/profile/'. auth()->user()->id);
        // dd(request()->all());
    }

    public function show(\App\Models\Post $post)
    {        
        // $userId = Auth::id();
        $user = DB::table("users")->where("id","=",$post->user_id)->first();
        $profile = DB::table("profiles")->where("user_id", "=", $post->user_id)->first();
        
        // return view('posts.show', compact('post'));
        if(empty($profile->image)){
            // $profile->image =public_path('storage') => storage_path('app/public/profile/5mAfDtuQTs7npuYKvTUpIB2ahBJjPbM6BErBh8lB.png');
            // $profile->image = 'C:\xampp\htdocs\agpro\storage\app\public\profile\5mAfDtuQTs7npuYKvTUpIB2ahBJjPbM6BErBh8lB.png';
            $profile->image = '/storage/profile/5mAfDtuQTs7npuYKvTUpIB2ahBJjPbM6BErBh8lB.png';
            $view='<img src="'. $profile->image .'">';
            // print_r($view);
            // dd($profile->image);exit;
        }
        else{
            $profile->image = '/storage/'.$profile->image;
        }

        return view('posts.show',[
            'post'      => $post,
            'user'      => $user,
            'profile'   => $profile,
            'noimage'   => '/storage/profile/5mAfDtuQTs7npuYKvTUpIB2ahBJjPbM6BErBh8lB.png'
        ]);
    }
    // public function import() 
    // {
    //     Excel::import(new UsersImport,request()->file('file'));
           
    //     return back();
    // }

    function import(Request $request)
    {
    
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();
        
        $data =  Excel::load($path)->get();
        dd($data);
     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
       foreach($value as $row)
       {
        $insert_data[] = array(
         'name'  => $row['name'],
         'email'   => $row['email'],
         'mobile'   => $row['mobile']
        );
       }
      }

      if(!empty($insert_data))
      {
       DB::table('students')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
    }
}

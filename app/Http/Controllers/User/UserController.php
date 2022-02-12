<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Toastr;
use Auth;
use Image;
use File;

class UserController extends Controller
{
    public function index()
    {

            return view('user.home');

    }

    public function updataData(REQUEST $request)

    {

            $request->validate([

                   'name'=>'required',
                   'email'=>'required',
                   'phone'=>'required',

            ]);

            User::findOrFail(Auth::id())->update([

                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'update_at'=>Carbon::now(),


            ]);

            $notification=array(

                'message'=>'Your Profile Updated',
                'alert-type'=>'success' 
            );

            return Redirect()->back()->with($notification);

    }

        public function imagePage()
        {

            return view('user/change_image');     
            
        }

        public function UpdateImage( REQUEST $request)
        {

            $old_image=$request->old_image;

            $request->validate([

                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',


            ]);
           
           if(User::findOrFail(Auth::id())->image == 'fontend/assets/images/user_profile/user.png') 
             {
                 
                $image=$request->file('image');
                $image_gan=time().$image->getClientOriginalName();
                Image::make($image)->save('fontend/assets/images/user_profile/'.$image_gan);
                $url='fontend/assets/images/user_profile/'.$image_gan;

                User::findOrFail(Auth::id())->update([

                    'image'=>$url

                ]);

                $notification=array(

                    'message'=>'Your Image Updated',
                    'alert-type'=>'success' 
                );
    
                return Redirect()->back()->with($notification);


              }
           else{

            $notification=array(

                'message'=>'Your Image Not Updated',
                'alert-type'=>'error' 
            );
            return Redirect()->back()->with($notification);

              }    

        }

        public function PasswordPage()
        {

            return view('User/change_password');
        }

        public function UpdatePassword(REQUEST $request)
        {

                $request->validate([


                     'old_password'=>'required',
                     'new_password'=>'required',
                     'confirm_password'=>'required',

                ]);

                   
                    $bd_pass=Auth::user()->password;
                    $current_pass=$request->old_password;
                    $newpass=$request->new_password;
                    $confirmpass=$request->confirm_password;

                if(Hash::check($current_pass,$bd_pass)){

                    if($newpass===$confirmpass)
                    {

                        User::findOrFail(Auth::id())->update([

                            'password'=>Hash::make($newpass),

                        ]);

                        Auth::logout();

                        $notification=array(

                            'message'=>'Your Password Change Success. Now Login with New Password..!!',
                            'alert-type'=>'success' 
                        );
            
                        return Redirect()->route('login')->with($notification);
        


                    }else{

                        $notification=array(

                            'message'=>'New Password and Confirm Password not Mach...!!',
                            'alert-type'=>'error' 
                        );
            
                        return Redirect()->back()->with($notification);
        

                    }
                    

                }else{

                    $notification=array(

                        'message'=>'Old Password not mach...!!',
                        'alert-type'=>'error' 
                    );
        
                    return Redirect()->back()->with($notification);
    
    
                }


        }
}

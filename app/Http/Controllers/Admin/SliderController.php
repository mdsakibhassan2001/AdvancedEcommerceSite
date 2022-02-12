<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use File;


class SliderController extends Controller
{
    public function slider(){

        $sliders=Slider::latest()->get();

        return view('admin/slider/index',compact('sliders'));
    }

    public function sliderStore(REQUEST $request)
    {

      $request->validate([

        'slider_image'=>'required',

      ]);

               $image=$request->file('slider_image');
               $image_gan=time().$image->getClientOriginalName();
               Image::make($image)->resize(870,370)->save('uploads/slider/'.$image_gan);
               $url='uploads/slider/'.$image_gan;

               Slider::insert([

                'title_en'=>$request->slider_title_en,
                'title_bn'=>$request->slider_title_bn,
                'description_en'=>$request->slider_description_en,
                'description_bn'=>$request->slider_description_bn,
                'image'=>$url,
                'created_at'=>Carbon::now(),
               ]);

               $notification=array(

                'message'=>'data inserted...!!',
                'alert-type'=>'success'
            );

            return Redirect()->back()->with($notification);

    }

    public function sliderEdit($id){

        $sliders=Slider::FindOrFail($id);
        return view('admin/slider/edit',compact('sliders'));
    }


    public function sliderUpdate(REQUEST $request)
    {

        $old_image=$request->old_image;
        $update_id=$request->update_id;

        if($request->file('slider_image'))
        {

            unlink($old_image);
            $request->validate([

                'slider_image'=>'required',

            ]);

            $image=$request->file('slider_image');
            $image_gan=time().$image->getClientOriginalName();
            Image::make($image)->resize(870,370)->save('uploads/slider/'.$image_gan);
            $url='uploads/slider/'.$image_gan;

            Slider::FindOrFail($update_id)->update([

             'title_en'=>$request->slider_title_en,
             'title_bn'=>$request->slider_title_bn,
             'description_en'=>$request->slider_description_en,
             'description_bn'=>$request->slider_description_bn,
             'image'=>$url,
             'created_at'=>Carbon::now(),
            ]);


            $notification=array(

                'message'=>'data inserted...!!',
                'alert-type'=>'success'
            );

            return Redirect()->route('sliders')->with($notification);

        }else{

            Slider::FindOrFail($update_id)->update([

                'title_en'=>$request->slider_title_en,
                'title_bn'=>$request->slider_title_bn,
                'description_en'=>$request->slider_description_en,
                'description_bn'=>$request->slider_description_bn,
                'created_at'=>Carbon::now(),
               ]);


               $notification=array(

                   'message'=>'data inserted...!!',
                   'alert-type'=>'success'
               );

               return Redirect()->route('sliders')->with($notification);


        }




    }

    public function sliderDelete($id){

            $id= Slider::FindOrFail($id);
            $delete_img=$id->image;
            unlink($delete_img);
            $id->delete();

            $notification=array(

                'message'=>'data delete successfly...!!',
                'alert-type'=>'success'
            );

            return Redirect()->route('sliders')->with($notification);

    }

    // Active Section

    public function sliderInactive($id)
    {
        Slider::FindOrFail($id)->update(['status'=>0]);

        $notification=array(

            'message'=>'Slider Status Update Successfly...!!',
            'alert-type'=>'success'
        );

        return Redirect()->route('sliders')->with($notification);

    }

    public function sliderActive($id)
    {
        Slider::FindOrFail($id)->update(['status'=>1]);

        $notification=array(

            'message'=>'Slider Status Update Successfly...!!',
            'alert-type'=>'success'
        );

        return Redirect()->route('sliders')->with($notification);

    }


}

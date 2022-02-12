<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use File;
use Image;
use Carbon\Carbon;
class BrandController extends Controller
{
    public function index()
    {
        $brands=Brand::latest()->get();
        return view('admin/brand/index',compact('brands'));
    }

    public function brandStore(REQUEST $request)
    {

      $request->validate([

        'brand_name_en'=>'required',
        'brand_name_bn'=>'required',
        'brand_img'=>'required',

      ],
      [

      'brand_name_en.required'=>'input english brand name',
      'brand_name_bn.required'=>'input bangla brand name'


       ]);

               $image=$request->file('brand_img');
               $image_gan=time().$image->getClientOriginalName();
               Image::make($image)->save('uploads/brand/'.$image_gan);
               $url='uploads/brand/'.$image_gan;

               Brand::insert([

                'brand_name_en'=>$request->brand_name_en,
                'brand_name_bn'=>$request->brand_name_bn,
                'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_bn'=>str_replace(' ','-',$request->brand_name_bn),
                'brand_image'=>$url,
                'created_at'=>Carbon::now(),
               ]);

               $notification=array(

                'message'=>'data inserted...!!',
                'alert-type'=>'success'
            );

            return Redirect()->back()->with($notification);

    }

    public function brandEdit($id)
    {

      $brand=Brand::FindOrFail($id);

      return view('admin/brand/edit',compact('brand'));

    }

    public function brandUpdate(REQUEST $request)

    {

      $update_id=$request->update_id;
      $old_img=$request->old_image;

      if($request->file('brand_img'))
      {
       unlink($old_img);
       $image=$request->file('brand_img');
       $image_gan=time().$image->getClientOriginalName();
       Image::make($image)->save('uploads/brand/'.$image_gan);
       $url='uploads/brand/'.$image_gan;

       Brand::findOrFail($update_id)->update([

        'brand_name_en'=>$request->brand_name_en,
        'brand_name_bn'=>$request->brand_name_bn,
        'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
        'brand_slug_bn'=>str_replace(' ','-',$request->brand_name_bn),
        'brand_image'=>$url,
        'created_at'=>Carbon::now(),
       ]);

       $notification=array(

        'message'=>'Update data inserted...!!',
        'alert-type'=>'success'
    );

    return Redirect()->route('brands')->with($notification);

      }else{



     Brand::findOrFail($update_id)->update([

         'brand_name_en'=>$request->brand_name_en,
         'brand_name_bn'=>$request->brand_name_bn,
         'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
         'brand_slug_bn'=>str_replace(' ','-',$request->brand_name_bn),
         'brand_image'=>$url,
         'created_at'=>Carbon::now(),
        ]);

        $notification=array(

         'message'=>'Update data inserted...!!',
         'alert-type'=>'success'
     );

     return Redirect()->route('brands')->with($notification);

      }

    }


    public function brandDelete($id)
    {

        $brand=Brand::findOrFail($id);

         $img=$brand->brand_image;
          unlink($img);
         Brand::findOrFail($id)->delete();

          $notification=array(

            'message'=>'Data Delete Successfly...!!',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);

    }
}


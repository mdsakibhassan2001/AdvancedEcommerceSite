<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubsubCategory;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use File;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;



class ProductController extends Controller
{

    public function addProduct(){

        $brands=Brand::latest()->get();
        $categorys=Category::latest()->get();
        return view('admin/product/create',compact('brands','categorys'));

    }

    public function getSubSubCat($subcat_id)
    {

        $subsubCat=SubsubCategory::where('subcategory_id',$subcat_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubCat);

    }

    public function store(REQUEST $request)
    {
        $request->validate([

            'brand_id'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_id'=>'required',
            'product_name_en'=>'required',
            'product_name_bn'=>'required',
            'product_code'=>'required',
            'product_qty'=>'required',
            'product_tags_en'=>'required',
            'product_tags_bn'=>'required',
            'product_size_en'=>'required',
            'product_size_bn'=>'required',
            'product_color_en'=>'required',
            'product_color_bn'=>'required',
            'selling_price'=>'required',
            'discount_price'=>'required',
            'short_descp_en'=>'required',
            'short_descp_bn'=>'required',
            'long_descp_en'=>'required',
            'long_descp_bn'=>'required',
            'product_thambnail'=>'mimes:jpeg,jpg,png,gif|required|max:10000',
            'multi_img'=>'required',

        ]);

        // ===Thamnail Image=======

            $image=$request->file('product_thambnail');
            $image_gan=time().$image->getClientOriginalName();
            Image::make($image)->resize(917,1000)->save('uploads/product/thambnail/'.$image_gan);
            $thambnail_image_url='uploads/product/thambnail/'.$image_gan;

            $Product_id=Product::insertGetId([


            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_id'=>$request->subsubcategory_id,
            'product_name_en'=>$request->product_name_en,
            'product_name_bn'=>$request->product_name_bn,
            'product_slug_en'=> strtolower(str_replace(' ','-',$request->product_name_en,)),
            'product_slug_bn'=> str_replace(' ','-',$request->product_name_en,),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags_en'=>$request->product_tags_en,
            'product_tags_bn'=>$request->product_tags_bn,
            'product_size_en'=>$request->product_size_en,
            'product_size_bn'=>$request->product_size_bn,
            'product_color_en'=>$request->product_color_en,
            'product_color_bn'=>$request->product_color_bn,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_descp_en'=>$request->short_descp_en,
            'short_descp_bn'=>$request->short_descp_bn,
            'long_descp_en'=>$request->long_descp_en,
            'long_descp_bn'=>$request->long_descp_bn,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'product_thambnail'=>$thambnail_image_url,
            'status'=> 1 ,
            'created_at'=>Carbon::now(),

            ]);

            //================== Multi Image ==================

                $multi_image=$request->file('multi_img');
                foreach($multi_image as $img ){

                    $image_gan=time().$img->getClientOriginalName();
                    Image::make($img)->save('uploads/product/multi_image/'.$image_gan);
                    $muti_image_url='uploads/product/multi_image/'.$image_gan;


                    MultiImg::insert([


                            'product_id'=>$Product_id,
                            'photo_name'=>$muti_image_url,
                            'created_at'=>Carbon::now(),

                    ]);

                }



            $notification=array(

                'message'=>'data inserted...!!',
                'alert-type'=>'success'
            );

            return Redirect()->back()->with($notification);

    }


    public function index()
    {

        $products=Product::latest()->get();

        return view('admin/product/index',compact('products'));

    }

    public function edit($id)
    {

        $products=Product::FindOrFail($id);
        $brands=Brand::latest()->get();
        $categorys=Category::latest()->get();
        $multi_images=MultiImg::where('product_id',$id)->latest()->get();
        return view('admin/product/edit',compact('products','brands','categorys','multi_images'));

    }

    public function productDataUpdate(REQUEST $request)
    {

        $request->validate([

            'brand_id'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_id'=>'required',
            'product_name_en'=>'required',
            'product_name_bn'=>'required',
            'product_code'=>'required',
            'product_qty'=>'required',
            'product_tags_en'=>'required',
            'product_tags_bn'=>'required',
            'product_size_en'=>'required',
            'product_size_bn'=>'required',
            'product_color_en'=>'required',
            'product_color_bn'=>'required',
            'selling_price'=>'required',
            'discount_price'=>'required',
            'short_descp_en'=>'required',
            'short_descp_bn'=>'required',
            'long_descp_en'=>'required',
            'long_descp_bn'=>'required',


        ]);

            $update_id=$request->productUpdate_id;

            Product::FindOrFail($update_id)->update([

            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_id'=>$request->subsubcategory_id,
            'product_name_en'=>$request->product_name_en,
            'product_name_bn'=>$request->product_name_bn,
            'product_slug_en'=> strtolower(str_replace(' ','-',$request->product_name_en,)),
            'product_slug_bn'=> str_replace(' ','-',$request->product_name_en,),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags_en'=>$request->product_tags_en,
            'product_tags_bn'=>$request->product_tags_bn,
            'product_size_en'=>$request->product_size_en,
            'product_size_bn'=>$request->product_size_bn,
            'product_color_en'=>$request->product_color_en,
            'product_color_bn'=>$request->product_color_bn,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_descp_en'=>$request->short_descp_en,
            'short_descp_bn'=>$request->short_descp_bn,
            'long_descp_en'=>$request->long_descp_en,
            'long_descp_bn'=>$request->long_descp_bn,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'status'=> 1 ,
            'created_at'=>Carbon::now(),

            ]);


            $notification=array(

                'message'=>'Data Updated Successfly...!!',
                'alert-type'=>'success'
            );

            return Redirect()->route('product.manage')->with($notification);
    }

    // Product Tahmbnail Update


    public function productThambnailUpdate(REQUEST $request){

        $thambnail_id=$request->thambnail_id;
        $old_img=$request->old_thambnail_img;
        unlink($old_img);

        $image=$request->file('product_thambnail');
        $image_gan=time().$image->getClientOriginalName();
        Image::make($image)->resize(917,1000)->save('uploads/product/thambnail/'.$image_gan);
        $thambnail_image_url='uploads/product/thambnail/'.$image_gan;

        Product::FindOrFail($thambnail_id)->update([

            'product_thambnail'=>$thambnail_image_url,
            'updated_at'=>Carbon::now(),

    ]);
    $notification=array(

        'message'=>'Product Thambnail Image Updated Successfly...!!',
        'alert-type'=>'success'
    );

    return Redirect()->route('product.manage')->with($notification);

    }


    public function productMultiImgDelete($id)
    {

        $image=MultiImg::FindOrFail($id);
        unlink($image->photo_name);
       MultiImg::FindOrFail($id)->delete();


        $notification=array(

            'message'=>'Product Thambnail Image Delete Successfly...!!',
            'alert-type'=>'success'
        );

        return Redirect()->route('product.manage')->with($notification);
    }

    // Multi Image Update


    public function productMultiImgUpdate(REQUEST $request){

        $imgs=$request->multi_img;

        foreach($imgs as $id=>$img){

            $unlinkImg=MultiImg::FindOrFail($id);
            unlink($unlinkImg->photo_name);

            $image_gan=time().$img->getClientOriginalName();
            Image::make($img)->save('uploads/product/multi_image/'.$image_gan);
            $muti_image_url='uploads/product/multi_image/'.$image_gan;


            MultiImg::where('id',$id)->update([

                    'photo_name'=>$muti_image_url,
                    'updated_at'=>Carbon::now(),

            ]);

        }

        $notification=array(

            'message'=>'Product Image Updated Successfly...!!',
            'alert-type'=>'success'
        );

        return Redirect()->route('product.manage')->with($notification);

    }

    // Active Section

    public function productInactive($id)
    {
        Product::FindOrFail($id)->update(['status'=>0]);

        $notification=array(

            'message'=>'Product Status Update Successfly...!!',
            'alert-type'=>'success'
        );

        return Redirect()->route('product.manage')->with($notification);

    }

    public function productActive($id)
    {
        Product::FindOrFail($id)->update(['status'=>1]);

        $notification=array(

            'message'=>'Product Status Update Successfly...!!',
            'alert-type'=>'success'
        );

        return Redirect()->route('product.manage')->with($notification);

    }

    public function productDelete($id){

        $delete=Product::FindOrFail($id);
        $tam_img=$delete->product_thambnail;
        unlink($tam_img);
        $product=Product::FindOrFail($id)->delete();

        $multi_images=MultiImg::where('product_id','id')->get();

        foreach ($multi_images as  $multi_image) {


                unlink($multi_image->multi_img);
                MultiImg::where('product_id','id')->delete();


        }

        $notification=array(

            'message'=>'Product Status Delete Successfly...!!',
            'alert-type'=>'success'
        );

        return Redirect()->route('product.manage')->with($notification);

    }

}

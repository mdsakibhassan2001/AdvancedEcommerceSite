<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;

class IndexController extends Controller
{
    public function index()
    {

        $categorys=Category::latest()->get();
        $sliders=Slider::where('status',1)->orderBy('id','DESC')->limit(5)->get();
        $products=Product::where('status',1)->orderBy('id','DESC')->get();
        $featureds=Product::where('featured',1)->where('status',1)->orderBy('id','DESC')->get();
        $hot_deals=Product::where('hot_deals',1)->where('status',1)->orderBy('id','DESC')->get();
        $special_offer=Product::where('special_offer',1)->where('status',1)->orderBy('id','DESC')->get();
        $skip_category_0=Category::skip(0)->first();
        $skip_product_0=Product::where('category_id',$skip_category_0->id)->where('status',1)->orderBy('id','DESC')->get();

        return view('fontend/index',compact('categorys','sliders','products','featureds','hot_deals','special_offer','skip_product_0','skip_category_0'));

    }

    public function singleProduct($id,$slug){

            $product=Product::FindOrFail($id);
            $multi_img=MultiImg::where('product_id',$id)->get();

            return view('fontend/single_product',compact('product','multi_img'));

    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubsubCategory;
use Carbon\Carbon;
use Mockery\Matcher\Subset;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys=Category::latest()->get();
        return view('admin/category/index',compact('categorys'));
    }

    public function categoryStore(REQUEST $request)
    {

      $request->validate([

        'category_name_en'=>'required',
        'category_name_bn'=>'required',
        'category_icon'=>'required',

      ],
      [

      'category_name_en.required'=>'input english brand name',
      'category_name_bn.required'=>'input bangla brand name'


       ]);



       Category::insert([

                'category_name_en'=>$request->category_name_en,
                'category_name_bn'=>$request->category_name_bn,
                'category_slug_en'=>strtolower(str_replace(' ','-',$request->category_name_en)),
                'category_slug_bn'=>str_replace(' ','-',$request->category_name_bn),
                'category_icon'=>$request->category_icon,
                'created_at'=>Carbon::now(),
               ]);

               $notification=array(

                'message'=>'data inserted...!!',
                'alert-type'=>'success'
            );

            return Redirect()->back()->with($notification);

    }

    public function categoryEdit($id)
    {

        $category=Category::FindOrFail($id);

         return view('admin/category/edit',compact('category'));


    }

    public function categoryUpdate(REQUEST $request)
    {

        $update_id=$request->update_id;


      $request->validate([

        'category_name_en'=>'required',
        'category_name_bn'=>'required',
        'category_icon'=>'required',

      ],
      [

      'category_name_en.required'=>'input english brand name',
      'category_name_bn.required'=>'input bangla brand name'


       ]);



       Category::findOrFail($update_id)->update([

                'category_name_en'=>$request->category_name_en,
                'category_name_bn'=>$request->category_name_bn,
                'category_slug_en'=>strtolower(str_replace(' ','-',$request->category_name_en)),
                'category_slug_bn'=>str_replace(' ','-',$request->category_name_bn),
                'category_icon'=>$request->category_icon,
                'created_at'=>Carbon::now(),
               ]);

               $notification=array(

                'message'=>'data Update...!!',
                'alert-type'=>'success'
            );

            return Redirect()->route('categorys')->with($notification);


    }


    public function categoryDelete($id)
    {

        $delete_id=Category::findOrFail($id);
        $delete_id->delete();

        $notification=array(

            'message'=>'data Delete...!!',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);

    }

 // ================== Sub Category part ==============================


    public function subindex()
    {

        $subcategorys=Subcategory::latest()->get();
        $categorys=Category::latest()->get();
        return view('admin/sub_category/index',compact('subcategorys','categorys'));
    }

    public function getSubCat($cat_id)
    {

        $subcat=Subcategory::where('category_id',$cat_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);

    }

    public function subcategoryStore(REQUEST $request)
    {


          $request->validate([

            'category_id'=>'required',
            'subcategory_name_en'=>'required',
            'subcategory_name_bn'=>'required',

          ],
          [

          'subcategory_name_en.required'=>'input english brand name',
          'subcategory_name_bn.required'=>'input bangla brand name'


           ]);



           Subcategory::insert([
                    'category_id'=>$request->category_id,
                    'subcategory_name_en'=>$request->subcategory_name_en,
                    'subcategory_name_bn'=>$request->subcategory_name_bn,
                    'subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subcategory_name_en)),
                    'subcategory_slug_bn'=>str_replace(' ','-',$request->subcategory_name_bn),
                    'created_at'=>Carbon::now(),
                   ]);

                   $notification=array(

                    'message'=>'data inserted...!!',
                    'alert-type'=>'success'
                );

                return Redirect()->back()->with($notification);



    }

    public function subcategoryEdit($id)
    {

         $subcategory=Subcategory::FindOrFail($id);
         $categorys=Category::latest()->get();
         return view('admin/sub_category/edit',compact('subcategory','categorys'));


    }

    public function subcategoryUpdate(REQUEST $request)
    {

        $request->validate([

            'category_id'=>'required',
            'subcategory_name_en'=>'required',
            'subcategory_name_bn'=>'required',

          ],
          [

          'subcategory_name_en.required'=>'input english brand name',
          'subcategory_name_bn.required'=>'input bangla brand name'


           ]);

            $update_id=$request->update_id;


            Subcategory::FindOrFail($update_id)->update([
                    'category_id'=>$request->category_id,
                    'subcategory_name_en'=>$request->subcategory_name_en,
                    'subcategory_name_bn'=>$request->subcategory_name_bn,
                    'subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subcategory_name_en)),
                    'subcategory_slug_bn'=>str_replace(' ','-',$request->subcategory_name_bn),
                    'created_at'=>Carbon::now(),
                   ]);

                   $notification=array(

                    'message'=>'data  update successflly...!!',
                    'alert-type'=>'success'
                );

                return Redirect()->route('subcategorys')->with($notification);

    }


    public function subcategoryDelete($id)
    {

        $delete_id=Subcategory::FindOrFail($id);
        $delete_id->delete();

        $notification=array(

            'message'=>'data Delete...!!',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);


    }



    //================ Sub Sub Category part==================================



    public function subsubindex()
    {

        $subsubcategorys=SubsubCategory::latest()->get();
        $categorys=Category::latest()->get();
        return view('admin/sub_subcategory/index',compact('subsubcategorys','categorys'));

    }


  
    public function getSubsubCat($cat_id)
    {

        $subsubcat=Subsubcategory::where('subcategory_id',$cat_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);

    }


    public function subsubcategoryStore(REQUEST $request)
    {


          $request->validate([

            'category_id'=>'required',
            'subcategory_id'=>'required',
            'sub_subcategory_name_en'=>'required',
            'sub_subcategory_name_bn'=>'required',

          ],
          [

          'sub_subcategory_name_en.required'=>'input english brand name',
          'sub_subcategory_name_bn.required'=>'input bangla brand name'


           ]);



           SubsubCategory::insert([
                    'category_id'=>$request->category_id,
                    'subcategory_id'=>$request->subcategory_id,
                    'subsubcategory_name_en'=>$request->sub_subcategory_name_en,
                    'subsubcategory_name_bn'=>$request->sub_subcategory_name_bn,
                    'subsubcategory_slug_en'=>strtolower(str_replace(' ','-',$request->sub_subcategory_name_en)),
                    'subsubcategory_slug_bn'=>str_replace(' ','-',$request->sub_subcategory_name_bn),
                    'created_at'=>Carbon::now(),
                   ]);

                   $notification=array(

                    'message'=>'data inserted...!!',
                    'alert-type'=>'success'
                );

                return Redirect()->back()->with($notification);




    }


    public function subsubcategoryEdit($id)
    {

         $subsubcategory=SubsubCategory::FindOrFail($id);

         return view('admin/sub_subcategory/edit',compact('subsubcategory'));


    }

    public function subsubcategoryUpdate(REQUEST $request)
    {

        $request->validate([


            'subsubcategory_name_en'=>'required',
            'subsubcategory_name_bn'=>'required',

          ],
          [

          'subsubcategory_name_en.required'=>'input english brand name',
          'subsubcategory_name_bn.required'=>'input bangla brand name'


           ]);

            $update_id=$request->update_id;


            SubsubCategory::FindOrFail($update_id)->update([

                    'subsubcategory_name_en'=>$request->subsubcategory_name_en,
                    'subsubcategory_name_bn'=>$request->subsubcategory_name_bn,
                    'subsubcategory_name_en'=>strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
                    'subsubcategory_name_bn'=>str_replace(' ','-',$request->subsubcategory_name_bn),
                    'created_at'=>Carbon::now(),
                   ]);

                   $notification=array(

                    'message'=>'data  update successflly...!!',
                    'alert-type'=>'success'
                );

                return Redirect()->route('subsubcategorys')->with($notification);

    }


    public function subsubcategoryDelete($id)
    {

        $delete_id=SubsubCategory::FindOrFail($id);
        $delete_id->delete();

        $notification=array(

            'message'=>'data Delete...!!',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);


    }


}

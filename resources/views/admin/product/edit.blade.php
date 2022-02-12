
@extends('layouts.admin_master')
@section('product')
active show-sub
@endsection
@section('add_product')
active
@endsection
@section('main_content')

<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">

                <div class="card">
                    <div class="card-header">
                        Add New Product
                    </div>
                    <div class="card-body">
                        <form action="{{route('product_data.update')}}" method="POST" >
                          @csrf
                          <div class="row row-sm">
                            <input type="hidden" value="{{$products->id}}" name="productUpdate_id">
                             <div class="col-md-4">
                                <div class="form-group">

                                    <label class="form-control-label">Brand Name: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2-show-search" name="brand_id" data-placeholder="Select one">

                                    @foreach ($brands as $brand)
                                      <option label="Choose one"></option>
                                      <option value="{{$brand->id}}" {{ $brand->id == $products->brand_id ? 'selected':''}} >{{$brand->brand_name_en}}</option>
                                      @endforeach

                                    </select>
                                    @error('brand_id')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2-show-search" name="category_id" data-placeholder="Select one">

                                    @foreach ($categorys as $category)
                                      <option label="Choose one"></option>
                                      <option value="{{$category->id}}" {{ $category->id == $products->category_id ? 'selected':''}}>{{$category->category_name_en}}</option>
                                      @endforeach

                                    </select>
                                    @error('category_id')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Sub Category Name: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2-show-search" name="subcategory_id" data-placeholder="Select one">
                                        <option label="Choose one"></option>
                                    </select>
                                    @error('subcategory_id')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Sub Sub Category Name: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2-show-search" name="subsubcategory_id" data-placeholder="Select one">
                                        <option label="Choose one"></option>
                                    </select>
                                    @error('subsubcategory_id')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name_en" value="{{$products->product_name_en}}" placeholder="product_name_en">
                                    @error('product_name_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name_bn" value="{{$products->product_name_bn}}" placeholder="product_name_bn">
                                    @error('product_name_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code" value="{{$products->product_code}}" placeholder="product_code">
                                    @error('product_code')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Qty: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_qty"  value="{{$products->product_qty}}" placeholder="product_qty">
                                    @error('product_qty')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Tages English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" data-role="tagsinput" type="text" name="product_tags_en" value="{{$products->product_tags_en}}"  placeholder="product_tags_en">
                                    @error('product_tags_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Tages Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" data-role="tagsinput" name="product_tags_bn" value="{{$products->product_tags_bn}}" placeholder="product_tags_bn">
                                    @error('product_tags_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" data-role="tagsinput" name="product_size_en" value="{{$products->product_size_en}}" placeholder="product_size_en">
                                    @error('product_size_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" data-role="tagsinput" name="product_size_bn" value="{{$products->product_size_bn}}" placeholder="product_size_bn">
                                    @error('product_size_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" data-role="tagsinput" name="product_color_en" value="{{$products->product_color_en}}" placeholder="product_color_en">
                                    @error('product_color_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" data-role="tagsinput" name="product_color_bn"  value="{{$products->product_color_bn}}" placeholder="product_color_bn">
                                    @error('product_color_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Selling Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="selling_price" value="{{$products->selling_price}}" placeholder="selling_price">
                                    @error('selling_price')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Discount Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="discount_price" value="{{$products->discount_price}}" placeholder="discount_price">
                                    @error('discount_price')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>



                              <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-control-label">Product Short Descp English: <span class="tx-danger">*</span></label>
                                     <textarea name="short_descp_en" id="summernote">{{$products->short_descp_en}}</textarea>
                                    @error('short_descp_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product Short Descp Bangla: <span class="tx-danger">*</span></label>
                                    <textarea name="short_descp_bn" id="summernote1">{{$products->short_descp_bn}}</textarea>
                                    @error('short_descp_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Long Descp English: <span class="tx-danger">*</span></label>
                                    <textarea name="long_descp_en" id="summernote2">{{$products->long_descp_en}}</textarea>
                                    @error('long_descp_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Long Descp Bangla: <span class="tx-danger">*</span></label>
                                    <textarea name="long_descp_bn" id="summernote3">{{$products->long_descp_bn}}</textarea>
                                    @error('long_descp_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="hot_deals" {{$products->hot_deals==1 ? 'checked':''}}><span>Hot Deals</span>
                                      </label>
                                    @error('hot_deals')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                         <input type="checkbox" name="featured" {{$products->featured==1 ? 'checked':''}}><span>Product Featured</span>
                                    </label>
                                    @error('featured')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                       <input type="checkbox" name="special_offer" {{$products->special_offer==1 ? 'checked':''}}><span>Product Special Offer</span>
                                     </label>
                                    @error('special_offer')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="special_deals" {{$products->special_deals==1 ? 'checked':''}}><span>Product Special deals</span>
                                   </label>
                                    @error('special_deals')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>
                              {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Thambnail: <span class="tx-danger">*</span></label>
                                    <input  onchange="previewFile(this);" class="form-control" type="file" name="product_thambnail"  placeholder="product_thambnail">
                                    <img src=""id="main_thambnail" alt="">
                                    @error('product_thambnail')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Multiple Image: <span class="tx-danger">*</span></label>
                                    <input class="form-control" id="multiple_img_input"type="file" name="multi_img[]" multiple  placeholder="multi_img">
                                    <div class="gallery"></div>
                                    @error('multi_img')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div> --}}

                              </div><!-- row -->
                              <div class="col-md-4">
                                <div class="form-layout-footer">
                                    <button  type="submit" class="btn btn-info mg-r-5">Update</button>

                                </div>

                              </div>


                         </form>

                         <form action="{{route('product_thambnail.update')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row ">
                            <div class="col-md-4">
                              <div class="form-group mt-3">
                                  <input type="hidden" name="thambnail_id" value="{{$products->id}}">
                                  <input type="hidden" name="old_thambnail_img" value="{{$products->product_thambnail}}">
                                <img class="card-img-top" height="250px" width="100px" src="{{asset($products->product_thambnail)}}" alt="Card image cap">
                                  <label class="form-control-label">Product Thambnail: <span class="tx-danger">*</span></label>
                                  <input  onchange="previewFile(this);" class="form-control" type="file" name="product_thambnail">
                                  <img src="" id="main_thambnail" alt="">

                                  @error('product_thambnail')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                               </div>

                            </div>
                          </div>

                          <div class="col-md-4 ">
                              <div class="form-layout-footer">
                                  <button  type="submit" class="btn btn-info mg-r-5">Update Thamnail Image</button>

                              </div>

                            </div>
                       </form>


                         <form action="{{route('product_multi_img.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @foreach ($multi_images as $multi_image)

                                    <div class="col-md-4">
                                        <div class="card mt-3" style="width: 18rem;">
                                            <img class="card-img-top" height="250px" width="100px" src="{{asset($multi_image->photo_name)}}" alt="Card image cap">
                                            <div class="card-body">
                                        <a href="{{route("product_multi_img.delete",$multi_image->id)}}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Image Change <span class="tx-danger">*</span></label>
                                                    <input class="form-control" id="multiple_img_input" type="file" name="multi_img[{{$multi_image->id}}]" multiple >

                                                    @error('multi_img')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </p>

                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            <div class="gallery"></div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-layout-footer">
                                    <button  type="submit" class="btn btn-info mg-r-5">Update MultiImage</button>

                                </div>

                              </div>
                </form>
                </div>
                    </div>


      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->


    {{-- ============sub category manue========= --}}

<script src="{{asset('backend')}}/lib/jquery-2.2.4.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="category_id"]').on('change', function(){
        var category_id = $(this).val();
        if(category_id) {
            $.ajax({
                url: "{{ url('/admin/subcategory/ajax')}}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    $('select[name="subsubcategory_id"]').html('');
                   var d =$('select[name="subcategory_id"]').empty();
                      $.each(data, function(key, value){

                          $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');

                      });

                },

            });
        } else {
            alert('danger');
        }

    });

});

</script>

{{-- ====sub sub category manue=== --}}

<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="subcategory_id"]').on('change', function(){
          var subcategory_id = $(this).val();
          if(subcategory_id) {
              $.ajax({
                  url: "{{ url('/admin/subsubcategory/ajax')}}/"+subcategory_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){

                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');

                        });

                  },

              });
          } else {
              alert('danger');
          }

      });


  });

  </script>

    {{-- ===== Thambnail Image ===== --}}

<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#main_thambnail").attr("src", reader.result).width(80).height(80);
            }

            reader.readAsDataURL(file);
        }
    }
</script>



{{-- ==========Multiple Image uplodate=============  --}}

<script>

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview).width(80).height(80);;
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#multiple_img_input').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});

</script>


@endsection

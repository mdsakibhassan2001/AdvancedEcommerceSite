
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
                        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row row-sm">

                             <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Brand Name: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2-show-search" name="brand_id" data-placeholder="Select one">

                                    @foreach ($brands as $brand)
                                      <option label="Choose one"></option>
                                      <option value="{{$brand->id}}">{{$brand->brand_name_en}}</option>
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
                                      <option value="{{$category->id}}">{{$category->category_name_en}}</option>
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
                                    <input class="form-control" type="text" name="product_name_en" value="{{old('product_name_en')}}" placeholder="product_name_en">
                                    @error('product_name_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_name_bn" value="{{old('product_name_bn')}}" placeholder="product_name_bn">
                                    @error('product_name_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_code" value="{{old('product_code')}}" placeholder="product_code">
                                    @error('product_code')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Qty: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="product_qty" value="{{old('product_qty')}}" placeholder="product_qty">
                                    @error('product_qty')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Tages English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" data-role="tagsinput" type="text" name="product_tags_en" value="{{old('product_tags_en')}}" placeholder="product_tags_en">
                                    @error('product_tags_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Tages Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" data-role="tagsinput" name="product_tags_bn" value="{{old('product_tags_bn')}}" placeholder="product_tags_bn">
                                    @error('product_tags_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" data-role="tagsinput" name="product_size_en" value="{{old('product_size_en')}}" placeholder="product_size_en">
                                    @error('product_size_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" data-role="tagsinput" name="product_size_bn" value="{{old('product_size_bn')}}" placeholder="product_size_bn">
                                    @error('product_size_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" data-role="tagsinput" name="product_color_en" value="{{old('product_color_en')}}" placeholder="product_color_en">
                                    @error('product_color_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" data-role="tagsinput" name="product_color_bn" value="{{old('product_color_bn')}}" placeholder="product_color_bn">
                                    @error('product_color_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Selling Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="selling_price" value="{{old('selling_price')}}" placeholder="product_color_bn">
                                    @error('selling_price')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Discount Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="discount_price" value="{{old('discount_price')}}" placeholder="discount_price">
                                    @error('discount_price')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
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
                                    <input class="form-control" id="multiple_img_input" type="file" name="multi_img[]" multiple id="multiImg"  placeholder="multi_img">
                                    <div class="gallery"></div>
                                    @error('multi_img')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Short Descp English: <span class="tx-danger">*</span></label>
                                     <textarea name="short_descp_en" id="summernote"></textarea>
                                    @error('short_descp_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Short Descp Bangla: <span class="tx-danger">*</span></label>
                                    <textarea name="short_descp_bn" id="summernote1"></textarea>
                                    @error('short_descp_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Long Descp English: <span class="tx-danger">*</span></label>
                                    <textarea name="long_descp_en" id="summernote2"></textarea>
                                    @error('long_descp_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Long Descp Bangla: <span class="tx-danger">*</span></label>
                                    <textarea name="long_descp_bn" id="summernote3"></textarea>
                                    @error('long_descp_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="hot_deals" value="1"checked><span>Hot Deals</span>
                                      </label>
                                    @error('hot_deals')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                         <input type="checkbox" name="featured" value="1" checked><span>Product Featured</span>
                                    </label>
                                    @error('featured')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                       <input type="checkbox" name="special_offer" value="1" checked><span>Product Special Offer</span>
                                     </label>
                                    @error('special_offer')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" name="special_deals" value="1" checked><span>Product Special deals</span>
                                   </label>
                                    @error('special_deals')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-layout-footer">
                                    <button  type="submit" class="btn btn-info mg-r-5">Submit</button>

                                </div>

                              </div>
                              </div><!-- row -->
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


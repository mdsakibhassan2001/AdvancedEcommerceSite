
@extends('layouts.admin_master')
@section('brands')
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
                        Add New Brand
                    </div>
                    <div class="card-body">
                        <form action="{{route('brand.update')}}" method="POST" enctype= multipart/form-data>
                          @csrf
                          <div class="row row-sm">

                             <div class="col-md-4">
                                 <input type="hidden" name="old_image"value="{{$brand->brand_image}}">
                                 <input type="hidden" name="update_id" value="{{$brand->id}}">
                              <div class="form-group">
                                  <label class="form-control-label">Brand Name English: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="brand_name_en" value="{{$brand->brand_name_en}}" placeholder="brand_name_en">
                                  @error('brand_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group">
                                  <label class="form-control-label">Brand Name Bangla: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="brand_name_bn" value="{{$brand->brand_name_bn}}" placeholder="brand_name_bn">
                                  @error('brand_name_bn')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group">
                                  <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="file" name="brand_img">
                                  @error('brand_img')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-layout-footer">
                                  <button  class="btn btn-info mg-r-5">Submit Form</button>
                              
                              </div>

                              </div>
                              </div><!-- row -->
                         </form>
                    </div>

                    </div>
              
                
     

    
      </div><!-- sl-pagebody -->
     
    </div><!-- sl-mainpanel -->

@endsection




@extends('layouts.admin_master')
@section('categorys')
    active show-sub
@endsection
@section('sub_category')
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
                        <form action="{{route('subcategory.update')}}" method="POST">
                          @csrf
                          <div class="row row-sm">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2-show-search" name="category_id" data-placeholder="Select one">

                                    @foreach ($categorys as $category)
                                      <option label="Choose one"></option>
                                      <option value="{{$category->id}}" {{$category->id == $subcategory->category_id ? 'selected':''}}>{{$category->category_name_en}}</option>
                                      @endforeach

                                    </select>
                                    @error('category_id')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                           </div>
                             <div class="col-md-4">

                                 <input type="hidden" name="update_id" value="{{$subcategory->id}}">

                              <div class="form-group">
                                <label class="form-control-label">SubCategory Name English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="subcategory_name_en" value="{{$subcategory->subcategory_name_en}}" placeholder="category_name_bn">
                                @error('subcategory_name_en')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                             </div>
                            </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subcategory_name_bn" value="{{$subcategory->subcategory_name_bn}}" placeholder="category_name_bn">
                                    @error('subcategory_name_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-layout-footer">
                                    <button  class="btn btn-info mg-r-5">Update</button>

                                </div>

                              </div>
                              </div><!-- row -->
                         </form>
                    </div>

                    </div>





      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

@endsection


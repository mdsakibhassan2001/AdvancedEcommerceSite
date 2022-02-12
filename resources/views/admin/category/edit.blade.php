
@extends('layouts.admin_master')
@section('categorys')
active show-sub
@endsection
@section('add_category')
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
                        <form action="{{route('category.update')}}" method="POST">
                          @csrf
                          <div class="row row-sm">
                             <div class="col-md-4">

                                 <input type="hidden" name="update_id" value="{{$category->id}}">
                                 <div class="form-group">
                                    <label class="form-control-label">Category Name English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name_en" value="{{$category->category_name_en}}">
                                    @error('category_name_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name_bn" value="{{$category->category_name_bn}}">
                                    @error('category_name_bn')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Category Icon: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_icon"  value="{{$category->category_icon}}">
                                    @error('category_icon')
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



@extends('layouts.admin_master')
@section('categorys')
    active show-sub
@endsection
@section('sub_sub_categorys')
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
                        <form action="{{route('subsubcategory.update')}}" method="POST">
                          @csrf
                          <div class="row row-sm">

                             <div class="col-md-4">

                                 <input type="hidden" name="update_id" value="{{$subsubcategory->id}}">

                                 <div class="form-group">
                                    <label class="form-control-label">Sub SubCategory Name English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subsubcategory_name_en" value="{{$subsubcategory->subsubcategory_name_en}}" placeholder="category_name_bn">
                                    @error('subsubcategory_name_en')
                                      <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Sub SubCategory Name Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subsubcategory_name_bn" value="{{$subsubcategory->subsubcategory_name_bn}}" placeholder="category_name_bn">
                                    @error('subsubcategory_name_en')
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


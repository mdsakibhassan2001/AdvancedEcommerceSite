
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
        <a class="breadcrumb-item" href="index.html">SHopMama</a>
        <span class="breadcrumb-item active">Sub Category</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
            <div class="col-md-8">
            <div class="card pd-20 pd-sm-40">

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Category Name</th>
                  <th class="wd-15p">SubCat Name En</th>
                  <th class="wd-20p">SubCat Name Bn</th>
                  <th class="wd-25p">Action</th>
                </tr>
              </thead>
              <tbody>

              @foreach($subcategorys as $item)

                    <tr>

                        <td>{{$item->category->category_name_en}}</td>
                        <td>{{$item->subcategory_name_en}}</td>
                        <td>{{$item->subcategory_name_bn}}</td>
                        <td>

                            <a class="btn btn-info btn-sm" href="{{route('subcategory.edit',$item->id)}}">Edit</a>
                            <a class="btn btn-danger btn-sm" id="delete" href="{{route('subcategory.delete',$item->id)}}">Delete</a>

                        </td>

                    </tr>

                @endforeach

              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Add New Brand
                    </div>
                    <div class="card-body">
                        <form action="{{route('subcategory.store')}}" method="POST">
                          @csrf
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

                              <div class="form-group">
                                <label class="form-control-label">SubCategory Name English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="subcategory_name_en" value="{{old('subcategory_name_bn')}}" placeholder="category_name_bn">
                                @error('subcategory_name_en')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                             </div>

                              <div class="form-group">
                                  <label class="form-control-label">Category Name Bangla: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="subcategory_name_bn" value="{{old('subcategory_name_bn')}}" placeholder="category_name_bn">
                                  @error('subcategory_name_bn')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>

                              <div class="form-layout-footer">
                                  <button  class="btn btn-info mg-r-5">Submit Form</button>

                              </div>
                         </form>
                    </div>

                    </div>
                </div>

        </div><!-- row -->


      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

@endsection


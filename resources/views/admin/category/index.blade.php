
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

        <div class="row row-sm">
            <div class="col-md-8">
            <div class="card pd-20 pd-sm-40">

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Category Icon</th>
                  <th class="wd-15p">Category Name En</th>
                  <th class="wd-20p">Category Name Bn</th>
                  <th class="wd-25p">Action</th>
                </tr>
              </thead>
              <tbody>

              @foreach($categorys as $item)
                    <tr>
                      <td><i class="{{$item->category_icon}}"></i></td>
                      <td>{{$item->category_name_en}}</td>
                      <td>{{$item->category_name_bn}}</td>
                      <td>

                        <a class="btn btn-info btn-sm" href="{{route('category.edit',$item->id)}}">Edit</a>
                        <a class="btn btn-danger btn-sm" id="delete" href="{{route('category.delete',$item->id)}}">Delete</a>

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
                        <form action="{{route('category.store')}}" method="POST">
                          @csrf
                              <div class="form-group">
                                  <label class="form-control-label">Category Name English: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="category_name_en" value="{{old('category_name_en')}}" placeholder="category_name_en">
                                  @error('category_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label class="form-control-label">Category Name Bangla: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="category_name_bn" value="{{old('category_name_bn')}}" placeholder="category_name_bn">
                                  @error('category_name_bn')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label class="form-control-label">Category Icon: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="category_icon"  value="{{old('category_icon')}}" placeholder="category_icon" >
                                  @error('category_icon')
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


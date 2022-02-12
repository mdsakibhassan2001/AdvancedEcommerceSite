
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

        <div class="row row-sm">
            <div class="col-md-8">
            <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Basic Responsive DataTable</h6>
          <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Brand Image</th>
                  <th class="wd-15p">Brand Name En</th>
                  <th class="wd-20p">Brand Name Bn</th>
                  <th class="wd-25p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($brands as $item)
                    <tr>
                      <td><img height="100px" width="90px"src="{{asset($item->brand_image)}}" alt=""></td>
                      <td>{{$item->brand_name_en}}</td>
                      <td>{{$item->brand_name_bn}}</td>
                      <td>
                        <a class="btn btn-info btn-sm" href="{{route('brand.edit',$item->id)}}">Edit</a>
                        <a class="btn btn-danger btn-sm" id="delete" href="{{route('brand.delete',$item->id)}}">Delete</a>

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
                        <form action="{{route('brand.store')}}" method="POST" enctype= multipart/form-data>
                          @csrf
                              <div class="form-group">
                                  <label class="form-control-label">Brand Name English: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="brand_name_en" value="{{old('brand_name_en')}}" placeholder="brand_name_en">
                                  @error('brand_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label class="form-control-label">Brand Name Bangla: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="brand_name_bn" value="{{old('brand_name_bn')}}" placeholder="brand_name_bn">
                                  @error('brand_name_bn')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="file" name="brand_img">
                                  @error('brand_img')
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


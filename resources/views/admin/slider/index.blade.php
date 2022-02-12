
@extends('layouts.admin_master')
@section('slider')
    active
@endsection
@section('main_content')

<div class="sl-mainpanel">

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
                  <th class="wd-15p">Slider Image</th>
                  <th class="wd-15p">Slider Title English</th>
                  <th class="wd-15p">Slider Title Bangla</th>
                  <th class="wd-20p">Slider Description English</th>
                  <th class="wd-20p">Slider Description Bangla</th>
                  <th class="wd-20p">Slider Status</th>
                  <th class="wd-25p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sliders as $slider)
                    <tr>
                      <td><img height="100px" width="90px"src="{{asset($slider->image)}}" alt=""></td>
                      <td>
                          @if ($slider->title_en==null)
                          <span class="badge badg-pill badge-danger">No Title Found</span>
                           @else

                          {{$slider->title_en}}
                          @endif
                        </td>
                      <td>
                        @if ($slider->title_bn==null)
                        <span class="badge badg-pill badge-danger">No Title Found</span>
                         @else

                        {{$slider->title_bn}}
                        @endif

                      <td>
                        @if ($slider->description_en==null)
                        <span class="badge badg-pill badge-danger" >No Description Found</span>
                        @else

                       {{$slider->description_en}}
                       @endif


                      </td>
                      <td>

                        @if ($slider->description_bn==null)
                        <span class="badge badg-pill badge-danger" >No Description Found</span>
                        @else

                       {{$slider->description_bn}}
                       @endif


                      <td>
                        @if ($slider->status==1)
                                <span class="badge-pill badge-success">Active</span>
                            @else
                            <span class="badge-pill badge-danger">Inactive</span>
                        @endif


                      </td>
                      <td>
                        <a class="btn btn-info btn-sm" href="{{route('slider.edit',$slider->id)}}">Edit</a>
                        <a class="btn btn-danger btn-sm" id="delete" href="{{route('slider.delete',$slider->id)}}">Delete</a>
                        @if ($slider->status==1)
                        <a class="btn btn-info btn-sm mt-2" href="{{route('slider.inactive',$slider->id)}}"><i class="fa fa-arrow-down"></i></a>
                         @else
                         <a class="btn btn-info btn-sm mt-2" href="{{route('slider.active',$slider->id)}}"><i class="fa fa-arrow-up"></i></a>
                     @endif
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
                        Add New Slider
                    </div>
                    <div class="card-body">
                        <form action="{{route('slider.store')}}" method="POST" enctype= multipart/form-data>
                          @csrf
                              <div class="form-group">
                                  <label class="form-control-label">Slider Title English<span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="slider_title_en" value="{{old('slider_title_en')}}" placeholder="slider_title_en">

                              </div>
                              <div class="form-group">
                                <label class="form-control-label">Slider Title Bangla<span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="slider_title_bn" value="{{old('slider_title_bn')}}" placeholder="slider_title_bn">

                            </div>
                              <div class="form-group">
                                  <label class="form-control-label">Slider Description English: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="slider_description_en" value="{{old('slider_description_en')}}" placeholder="slider_description_en">

                              </div>
                              <div class="form-group">
                                  <label class="form-control-label">Slider Description Bangla: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="text" name="slider_description_bn" value="{{old('slider_description_bn')}}" placeholder="slider_description_bn">

                              </div>
                              <div class="form-group">
                                  <label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
                                  <input class="form-control" type="file" name="slider_image">
                                  @error('slider_image')
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


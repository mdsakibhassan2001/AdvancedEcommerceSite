
@extends('layouts.admin_master')
@section('slider')
    active
@endsection
@section('main_content')


<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Slider</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">


                <div class="card">
                    <div class="card-header">
                       Edit Slider
                    </div>
                    <div class="card-body">
                        <form action="{{route('slider.update')}}" method="POST" enctype= multipart/form-data>
                          @csrf
                          <div class="row row-sm">
                            <input type="hidden" name="update_id" value="{{$sliders->id}}">
                          <input type="hidden" name="old_image"value="{{$sliders->image}}">
                           @if ($sliders->title_en==null)

                            @else
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Slider Title English<span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="slider_title_en" value="{{$sliders->title_en}}" placeholder="slider_title_en">

                                </div>
                             </div>

                             <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Slider Title Bangla<span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="slider_title_bn" value="{{$sliders->title_bn}}" placeholder="slider_title_bn">

                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Slider Description English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="slider_description_en" value="{{$sliders->description_en}}" placeholder="slider_description_en">

                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Slider Description Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="slider_description_bn" value="{{$sliders->description_bn}}" placeholder="slider_description_bn">

                                </div>
                              </div>

                              @endif

                             <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
                                    <input class="form-control"  onchange="previewFile(this);" type="file" name="slider_image">
                                    @error('slider_image')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>
                              </div>
                              <div class="col-md-4">
                                <img src="" class="mt-3"   id="main_thambnail" alt="">

                                <img  class="mt-3" id="old_image" height="100px" width="200" src="{{asset($sliders->image)}}" alt="">
                            </div>
                              <div class="col-md-4">
                                <div class="form-layout-footer">
                                    <button  class="btn btn-info mg-r-5">Submit Form</button>

                                </div>
                              </div>
                          </div>

                         </form>
                    </div>
                    </div>





      </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->



    {{--========== previewFile Image show code============= --}}

    <script>


        function previewFile(input){




            var file = $("input[type=file]").get(0).files[0];

            if(file){
                var reader = new FileReader();

                reader.onload = function(){
                    $("#main_thambnail").attr("src", reader.result).width(200).height(100);
                }

                reader.readAsDataURL(file);
            }

            $('#old_image').hide();

        }
    </script>

@endsection


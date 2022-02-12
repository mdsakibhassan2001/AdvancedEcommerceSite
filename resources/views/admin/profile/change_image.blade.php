@extends('layouts.admin_master')

@section('main_content')

<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

  <div class="sl-pagebody">

   <div class="row row-sm">
       

            <div class="col-md-6 col-xl-6 col-sm-12">
            @include('admin.profile.inc.sidebar')
            </div>

         <div class="col-md-6 col-xl-6 col-sm-12">

            <h3 class="text-center">Hi..! {{Auth::user()->name}} Update Your Profile</h3>
        <form action="{{route('adminUpdate.image')}}" method="POST" enctype= multipart/form-data>
                @csrf
                <label for="name" class="col-form-label ">Name</label>
                <div class="mb-3s">
                   <input  type="hidden" class="form-control @error('image') is-invalid @enderror"   name="old_image" value="{{ Auth::user()->image }}">
                     <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"   name="image" value="{{ old('image') }}">
                     @error('image')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>

                <div class="form-group row mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary submit">
                                    {{ __('Update') }}
                                </button>
                            </div>
                 </div>
            </form>

        </div>
           

   </div><!-- row -->

    
     </div><!-- sl-pagebody -->
     
    </div><!-- sl-mainpanel -->

@endsection


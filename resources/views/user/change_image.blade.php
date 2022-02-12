@extends('layouts/.fontend_master')
@section('content')
 <div class="breadcrumb">
        <div class="container">
         
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
     
 </div><!-- /.breadcrumb -->
<section class="user_profile">
    <div class="container">
     <div class="sign-in-page">
        <div class="row">
            <div class="col-md-6 col-xl-6 col-sm-12">
                @include('user.inc.sidebar')
            </div>

         <div class="col-md-6 col-xl-6 col-sm-12">

            <h3 class="text-center">Hi..! {{Auth::user()->name}} Update Your Profile</h3>
        <form action="{{route('update.image')}}" method="POST" enctype= multipart/form-data>
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
      
    </div>
    </div>
</section>
 

@endsection
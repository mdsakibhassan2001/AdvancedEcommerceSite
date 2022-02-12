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
        <form action="{{route('adminUpdate.passowrd')}}" method="POST">
                @csrf
                <label for="name" class="col-form-label ">Old Password</label>
                <div class="mb-3s">
                     <input  type="text"class="form-control @error('name') is-invalid @enderror"  plasholder="old password" name="old_password">
                     @error('old_password')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>

                <label for="name" class="col-form-label ">New Password</label>
                <div class="mb-3s">
                     <input  type="text"class="form-control @error('name') is-invalid @enderror"   name="new_password">
                     @error('new_password')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>

                <label for="name" class="col-form-label ">Confirm Password</label>
                <div class="mb-3s">
                     <input  type="text"class="form-control @error('name') is-invalid @enderror"   name="confirm_password">
                     @error('confirm_password')
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


      

           
   </div><!-- row -->

    
     </div><!-- sl-pagebody -->
     
    </div><!-- sl-mainpanel -->

@endsection


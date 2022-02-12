@extends('layouts/fontend_master')
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
        <form action="{{route('update.profile')}}" method="POST">
                @csrf
                <label for="name" class="col-form-label ">Name</label>
                <div class="mb-3s">
                     <input id="name" type="text" value="{{Auth::user()->name}}" class="form-control @error('name') is-invalid @enderror"   name="name" value="{{ old('name') }}">
                     @error('name')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>

                <label for="Email" class="col-form-label ">Email</label>
                <div class="mb-3s">
                     <input id="email" type="email" value="{{Auth::user()->email}}" class="form-control @error('email') is-invalid @enderror"   name="email" value="{{ old('email') }}">
                     @error('email')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>

                <label for="phone" class="col-form-label ">Phone</label>
                <div class="mb-3s">
                     <input id="phone" type="text" value="{{Auth::user()->phone}}" class="form-control @error('name') is-invalid @enderror"   name="phone" value="{{ old('phone') }}">
                     @error('phone')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                </div>
               

                <div class="form-group row mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary submit">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                 </div>
            </form>

        </div>
      
    </div>
    </div>
</section>
 

@endsection
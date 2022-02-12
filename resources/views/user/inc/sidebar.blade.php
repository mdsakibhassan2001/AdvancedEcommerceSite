<div class="card user_menu" style="width: 18rem;">
    <img src="{{asset(Auth::user()->image)}}" class="card-img-top d-flex align-items-center" alt="" >
    <ul class="list-group list-group-flush">
        <li class="list-group-item btn "> <a href="{{ url('/')}}">Home</a></li>
        <li class="list-group-item btn "><a href="{{ route('user.image')}}">Update Image</a> </li>
        <li class="list-group-item btn "><a href="{{ route('user.passowrd')}}">Update Password</a> </li>
        <li class="list-group-item btn "><a href="{{ route('logout') }}"            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form><i class="icon ion-power"></i> Sign Out</a>
            
            </li>
    </ul>
</div>
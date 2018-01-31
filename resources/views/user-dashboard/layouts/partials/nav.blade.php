<div class="navbar navbar-dark bg-dark sticky-top">
<div class="container-fluid d-flex justify-content-between">
<a href="/" class="navbar-brand"><img src="{{ asset('images/MBJ_logo@4x.png')}}"/></a>



  <nav class="nav user-nav">
    
      <!-- Authentication Links -->
      @if (Auth::guest())
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
      @else
          <li class="nav-item">
              <a href="#" class="nav-link" role="button" aria-expanded="false">
                  My Account <span class="caret"></span>
              </a>
          </li>

           <li class="nav-item">
              <a target="_blank" href="{{ config('mbj.main_app_url') }}" class="nav-link" role="button" aria-expanded="false">
                  My Business Journey <span class="caret"></span>
              </a>
          </li>


      @endif
     
  </nav>

</div>

@if($flash = session('message'))
<div class="alert alert-success" role="alert">
{{ $flash }}
</div>
@endif 
</div>
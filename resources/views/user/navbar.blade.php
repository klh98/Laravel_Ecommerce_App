<link rel="stylesheet" href="{{ asset('css/style.css') }}">


<nav class="bg-primary">
    <a href=""><img src="../../img/logo.png" alt="" style="width: 250px"></a>
    <div class="nav-links" id="navLinks">
        <span class="material-symbols-outlined" onclick="hideMenu()">
            close
            </span>
        <ul>
            <li><a href="{{ url('/') }}">HOME</a></li>
            <li><a href="{{ url('/categories') }}">SALE</a></li>
            <li><a href="">SERVICE</a></li>
            <li><a href="">ABOUT US</a></li>

            @if(Route::has('login'))
            @auth

            <li><a href="{{ url('/cart') }}">CART</a> <span class="badge badge-pill bg-white cart-count">0</span></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('/logout') }}"
                            class="dropdown-item"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="margin-left: 30px">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>

            @else
            {{-- <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
              </li> --}}

              <li><a href="{{ url('/login') }}">LOG IN / REGISTER</a></li>

            @endif
            @endauth


        </ul>

    </div>
    <span class="material-symbols-outlined" onclick="showMenu()">
        menu
    </span>
</nav>

       @if (session('message'))
       <div class="alert alert-success">
           {{ session('message') }}
       </div>
   @endif

<script>

    let navLinks= document.getElementById("navLinks");

    function showMenu()
    {
        navLinks.style.right="0";
    }

    function hideMenu()
    {
        navLinks.style.right="-100%";
    }

</script>

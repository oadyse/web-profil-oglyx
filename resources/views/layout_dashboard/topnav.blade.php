<div class="iq-top-navbar" style="width: 100%">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="side-menu-bt-sidebar">
                <h4>
                    <h4>
                        <a href="{{ url('/') }}"><img src="{{ asset('dashboard') }}/assets/images/Logo.png"
                                alt="" class="img-fluid" width="35px">
                            &nbsp; UD. Oglyx Pandiga</a>
                    </h4>
                </h4>
            </div>
            <div class="d-flex align-items-center">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">
                        <li class="nav-item nav-icon mr-2 dropdown">
                            <a href="{{ route('menu-dashboard') }}"><u>Daftar Pesanan</u></a>
                        </li>
                        <li class="nav-item nav-icon mr-2">
                            <h4><b>|</b></h4>
                        </li>
                        <li class="nav-item nav-icon mr-3 dropdown">
                            <a href="{{ route('menu-produk') }}"><u>Daftar Produk</u></a>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="{{ asset('dashboard') }}/assets/images/user/1.jpg"
                                    class="img-fluid avatar-rounded" alt="user">
                                <span class="mb-0 ml-2 user-name"><b> {{ Auth::user()->name }} </b></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">

                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

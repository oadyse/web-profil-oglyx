@if (!empty(Auth::user()->name))
    @include('layout_dashboard.header')

    <body class="  ">
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
                                <li class="nav-item nav-icon dropdown">
                                    <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <img src="{{ asset('dashboard') }}/assets/images/user/1.jpg"
                                            class="img-fluid avatar-rounded" alt="user">
                                        <span class="mb-0 ml-2 user-name"> {{ Auth::user()->name }}</span>
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
                                                    <a class="nav-link"
                                                        href="{{ route('register') }}">{{ __('Register') }}</a>
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
        <div class="content-page ml-0" style="width: 100%">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <div class="header-title">
                                    <h4 class="card-title">Tabel Daftar Pemesanan</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable-1" class="table data-table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="5%">No.</th>
                                                <th width="15%">Tanggal Pesan</th>
                                                <th>Pemesan</th>
                                                <th>Status</th>
                                                <th width="15%">Order</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($orders as $order){
                                            ?>
                                            <tr>
                                                <td class="text-center">{{ $no }}.</td>
                                                <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                                <td>
                                                    <ul>
                                                        <li>{{ 'No-Order       : ' . $order->no_order }}</li>
                                                        <li>{{ 'Nama           : ' . $order->nama }}</li>
                                                        <li>{{ 'Nomor WhatsApp : ' . $order->no_wa }}</li>
                                                        <li>{{ 'Alamat         : ' . $order->alamat }}</li>
                                                    </ul>
                                                </td>
                                                <td>{{ $order->status }}</td>
                                                <td>
                                                    <a class="btn btn-success" href="/detail/{{ $order->id }}">
                                                        Detail Pesanan
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php 
                                            $no += 1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layout_dashboard.script')

    </body>

    </html>
@endif

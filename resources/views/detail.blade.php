@if (!empty(Auth::user()->name))
    @include('layout_dashboard.header')

    <body class="  ">
        <div class="iq-top-navbar" style="width: 100%">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="side-menu-bt-sidebar">
                        <h4>
                            <a href="{{ url('/') }}"><img src="{{ asset('dashboard') }}/assets/images/Logo.png"
                                    alt="" class="img-fluid" width="35px">
                                &nbsp; UD. Oglyx Pandiga</a>
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
                            <div class="card-header d-flex justify-content-between">
                                <a class="btn btn-primary btn-sm" href="{{ url('admin') }}" title="Back">
                                    Back to list </a>
                                <div class="header-title">
                                    <h4 class="card-title">Tabel Daftar Pemesanan</h4>
                                </div>
                                <div class="header-title">
                                    <h4 class="card-title"></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody class="font-weight-bold">
                                            <tr>
                                                <td class="py-0" width="14%">No-Order</td>
                                                <td class="py-0" width="1%">:</td>
                                                <td class="py-0" width="85%">{{ $pesanan->no_order }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-0" width="14%">Nama</td>
                                                <td class="py-0" width="1%">:</td>
                                                <td class="py-0" width="85%">{{ $pesanan->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-0" width="14%">No. WhatsApp</td>
                                                <td class="py-0" width="1%">:</td>
                                                <td class="py-0" width="85%">{{ $pesanan->no_wa }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-0" width="14%">Alamat</td>
                                                <td class="py-0" width="1%">:</td>
                                                <td class="py-0" width="85%">{{ $pesanan->alamat }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table id="datatable-1" class="table data-table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total Harga</th>
                                                <th colspan="4">Status Pesanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    @foreach ($details as $detail)
                                                        <div class="mb-2">{{ $detail->nama }}</div><br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($details as $detail)
                                                        <div class="mb-2">
                                                            {{ 'Rp ' . number_format($detail->harga, 2, ',', '.') }}
                                                        </div><br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($totals as $total)
                                                        <div class="mb-2">
                                                            {{ $total->total }} Ton
                                                        </div><br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <?php $all = 0; ?>
                                                    @foreach ($details as $detail => $d)
                                                        @foreach ($totals as $total => $t)
                                                            @if ($detail == $total)
                                                                <?php $a = $d->harga * $t->total; ?>
                                                                <div class="mb-2">
                                                                    {{ 'Rp ' . number_format($a, 2, ',', '.') }}</div>
                                                                <br>
                                                                <?php
                                                                $all += $a;
                                                                ?>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <h5>
                                                        <?php $id = $pesanan->id; ?>
                                                        @if ($pesanan->status == 'Belum Proses')
                                                            <span class="mt-2 badge badge-secondary">
                                                                Belum Proses
                                                            </span>
                                                            <a class="iq-icons-list m-1 text-left" href=""
                                                                title="Edit" data-toggle="modal"
                                                                data-target="#edit{{ $id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="m-0">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                </svg>
                                                            </a>
                                                        @elseif ($pesanan->status == 'Proses')
                                                            <span class="mt-2 badge badge-warning">
                                                                Proses
                                                            </span>
                                                            <a class="iq-icons-list m-1 text-left" href=""
                                                                title="Edit" data-toggle="modal"
                                                                data-target="#edit{{ $id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="m-0">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                </svg>
                                                            </a>
                                                        @elseif ($pesanan->status == 'Selesai')
                                                            <span class="mt-2 badge badge-success">
                                                                Selesai
                                                            </span>
                                                        @endif
                                                        @include('edit-status')
                                                    </h5>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="3"><b>Total Harga Pesanan</b></td>
                                                <td colspan="2">{{ 'Rp ' . number_format($all, 2, ',', '.') }}</td>
                                            </tr>
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

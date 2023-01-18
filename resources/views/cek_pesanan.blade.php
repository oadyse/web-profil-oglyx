@include('layout_dashboard.header')

@include('layout_dashboard.header')

<body class="  ">
    <div class="iq-top-navbar" style="width: 100%">
        <div class="iq-navbar-custom mt-3">
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
                        <a class="btn btn-primary btn-sm" href="{{ url('/produk') }}" title="Back">
                            Back to Homepage </a>
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
                                <h4 class="card-title">Cek Pemesanan Anda</h4>
                            </div>
                        </div>
                        @foreach ($data as $pesanan)
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody class="font-weight-bold">
                                            <tr>
                                                <td class="py-0" width="14%">No-Order</td>
                                                <td class="py-0" width="1%">:</td>
                                                <td class="py-0" width="85%">{{ $pesanan->no_order }}
                                                </td>
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
                                                <td class="py-0" width="85%">{{ $pesanan->alamat }}
                                                </td>
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
                                                    @foreach ($pesanan->detail as $detail)
                                                        <div class="mb-2">{{ $detail->produk->nama }}
                                                        </div><br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($pesanan->detail as $detail)
                                                        <div class="mb-2">
                                                            {{ 'Rp ' . number_format($detail->produk->harga, 2, ',', '.') }}
                                                        </div><br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($pesanan->total as $total)
                                                        <div class="mb-2">
                                                            {{ $total->total }} Ton
                                                        </div><br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <?php $all = 0; ?>
                                                    @foreach ($pesanan->detail as $detail => $d)
                                                        @foreach ($pesanan->total as $total => $t)
                                                            @if ($detail == $total)
                                                                <?php $a = $d->produk->harga * $t->total; ?>
                                                                <div class="mb-2">
                                                                    {{ 'Rp ' . number_format($a, 2, ',', '.') }}
                                                                </div>
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
                                                        @elseif ($pesanan->status == 'Proses')
                                                            <span class="mt-2 badge badge-warning">
                                                                Proses
                                                            </span>
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
                                                <td class="text-right" colspan="3"><b>Total Harga
                                                        Pesanan</b></td>
                                                <td colspan="2">
                                                    {{ 'Rp ' . number_format($all, 2, ',', '.') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout_dashboard.script')

</body>

</html>

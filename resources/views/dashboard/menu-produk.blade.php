@if (!empty(Auth::user()->name))
    @include('layout_dashboard.header')

    <body class="  ">
        @include('layout_dashboard.topnav')

        <div class="content-page ml-0" style="width: 100%">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="header-title">
                                    <h4 class="card-title text-center">Tabel Daftar Produk</h4>
                                    <button class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                        data-target="#create">Tambah Produk</button>

                                    {{-- Modal Create --}}
                                    @include('dashboard.create_produk')
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable-1" class="table data-table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="5%">No.</th>
                                                <th>Nama Produk</th>
                                                <th>Harga(per ton)</th>
                                                <th>Jumlah(per ton)</th>
                                                <th width="15%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($product as $produk){
                                            ?>
                                            <tr>
                                                <td class="text-center">{{ $no }}.</td>
                                                <td>{{ $produk->nama }}</td>
                                                <td>{{ 'Rp ' . number_format($produk->harga, 0, ',', '.') }}</td>
                                                <td>{{ $produk->stok }}</td>
                                                <td>
                                                    <button class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#edit{{ $produk->id }}">Ubah
                                                    </button>
                                                    <a class="btn btn-danger btn-sm"
                                                        href="{{ route('delete', $produk->id) }}">Hapus
                                                    </a>

                                                    {{-- Modal Create --}}
                                                    @include('dashboard.edit_produk')
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

@if (!empty(Auth::user()->name))
    @include('layout_dashboard.header')

    <body class="  ">
        @include('layout_dashboard.topnav')

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
                                                    <a class="btn btn-success"
                                                        href="{{ route('detail-pesanan', $order->id) }}">
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

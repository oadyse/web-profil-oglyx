@if (!empty(Auth::user()->name))
    @include('layout_dashboard.header')

    <body class="  ">
        @include('layout_dashboard.topnav')

        <div class="content-page ml-0" style="width: 100%">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="text-center m-5">
                                <span>
                                    <i>Produk tidak dapat dihapus, karena berada dalam pesanan.</i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layout_dashboard.script')

    </body>

    @include('layout_dashboard.script')

    </body>

    </html>
@endif

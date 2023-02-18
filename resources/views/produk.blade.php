@include('layout_landing.header')

<!-- ======= Hero Produk Section ======= -->
<section id="produk">
    <div class="produk-container" data-aos="fade-up">
        <h2>Daftar Produk</h2>
        <h1 class="mb-5">UD. Oglyx Pandiga</h1>
    </div>
</section><!-- End Hero Produk -->

<main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Daftar Produk</h2>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" onclick="modalPesanan()">
                        Pesan Produk
                    </button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#form_search">
                        Cek Pesanan
                    </button>
                </div>

                <!-- Modal Create-->
                <div class="modal fade" id="pemesanan" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header text-center bg-success text-light">
                                <h5 class="modal-title" id="exampleModalLabel">Form Pemesanan</h5>
                                <button type="button" class="btn-close text-light" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="form-pesanan" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nomor (WhatsApp)</label>
                                        <input type="text" name="no_wa" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3" required></textarea>
                                    </div>
                                    <hr>
                                    <div class="text-center mb-3">
                                        <label><b>Tambahkan jumlah produk yang ingin dipesan:</b></label>
                                    </div>
                                    @foreach ($produks as $produk)
                                        <div class="row mb-3 mx-auto">
                                            <div class="col-8 my-auto">
                                                <label class="form-label">
                                                    <small>
                                                        {{ $produk->nama }} <br>
                                                        <span style="color: brown;">
                                                            ({{ 'Rp ' . number_format($produk->harga, 0, ',', '.') . '/ton' }})
                                                        </span>
                                                        <small>Stok : {{ $produk->stok }}</small>
                                                    </small>
                                                    <input type="hidden" name="harga[]" value="{{ $produk->harga }}" />
                                                </label>
                                            </div>
                                            <div class="col-3 text-center">
                                                <input type="hidden" name="id_produk[]" value="{{ $produk->id }}" />
                                                <input type="number" id="total" min="0"
                                                    max="{{ $produk->stok }}" name="total[]" class="form-control"
                                                    placeholder="0">
                                            </div>
                                            <div class="col-1">
                                                <small>ton</small>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Lakukan
                                    Pemesanan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Search-->
                <div class="modal fade" id="form_search" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header text-center bg-warning text-light">
                                <h5 class="modal-title" id="exampleModalLabel">Masukkan Nomor pesanan</h5>
                                <button type="button" class="btn-close text-light" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Start kode untuk form pencarian -->
                                <form class="form" action="{{ route('search') }}" method="get">
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control" id="search"
                                            placeholder="Masukkan no-order" value="{{ old('search') }}" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-in">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">Bawang Siap Konsumsi</li>
                        <li data-filter=".filter-card">Benih Bawang</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up">
                @foreach ($produks as $produk)
                    @if (strpos($produk->nama, 'Benih') !== false)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <div class="portfolio-wrap" style="height: 200px">
                                <img src="dokumen/produk/{{ $produk->gambar }}" class="img-fluid"
                                    alt="{{ $produk->nama }}">
                                <div class="portfolio-links">
                                    <a href="dokumen/produk/{{ $produk->gambar }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="{{ $produk->nama }}">
                                        <i class="bx bx-plus"></i>
                                    </a>
                                    <a href="{{ url('produkdetail/' . $produk->id) }}" title="More Details"><i
                                            class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap" style="height: 200px">
                                <img src="dokumen/produk/{{ $produk->gambar }}" class="img-fluid"
                                    alt="{{ $produk->nama }}">
                                <div class="portfolio-links">
                                    <a href="dokumen/produk/{{ $produk->gambar }}" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox" title="{{ $produk->nama }}">
                                        <i class="bx bx-plus"></i>
                                    </a>
                                    <a href="{{ url('produkdetail/' . $produk->id) }}" title="More Details"><i
                                            class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section><!-- End Portfolio Section -->

</main><!-- End #main -->

@include('layout_landing.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

@include('layout_landing.script')

</body>

</html>

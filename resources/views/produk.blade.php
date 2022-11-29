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
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pemesanan">
                        Pesan Produk
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="pemesanan" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h5 class="modal-title" id="exampleModalLabel">Form Pemesanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nomor (WhatsApp)</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Lakukan Pemesanan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" data-aos="fade-in">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-links">
                            <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                                class="portfolio-lightbox" title="a">
                                <i class="bx bx-plus"></i>
                            </a>
                            <a href="{{ route('detail-produk') }}" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>

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

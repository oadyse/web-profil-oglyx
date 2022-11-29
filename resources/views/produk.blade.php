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
                <div class="justify-content-center">
                    <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#pemesanan">Beli</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="pemesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
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

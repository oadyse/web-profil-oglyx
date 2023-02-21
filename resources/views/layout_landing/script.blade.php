<!-- Vendor JS Files -->
<script src="{{ asset('assets') }}/vendor/purecounter/purecounter.js"></script>
<script src="{{ asset('assets') }}/vendor/aos/aos.js"></script>
<script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets') }}/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{ asset('assets') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{ asset('assets') }}/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('assets') }}/vendor/php-email-form/validate.js"></script>

{{-- Sweet Alert --}}
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets') }}/js/main.js"></script>
<script type="text/javascript">
    function modalPesanan() {
        $('#pemesanan').modal('show')
        $('#form-pesanan')[0].reset()
    }
    $('#form-pesanan').on('submit', function(event) {
        event.preventDefault() //jangan disubmit
        tambahPesanan()
    });

    function tambahPesanan() {
        let form = $('#form-pesanan');
        const url = '{{ url('tambah_pesanan') }}';
        $.ajax({
            url,
            method: "POST",
            data: form.serialize(),
            success: function(response) {
                if (response != null) {
                    $('#pemesanan').modal('hide')
                    successNotify(response)
                    $('#form-pesanan')[0].reset()
                }
                // cosole.log(response)
            },
            error: function(e) {
                alert('Something wrong!')
            }
        })
    }

    function successNotify(res, resB) {
        var nilai = new Intl.NumberFormat(['ban', 'id']).format(res.tot);
        var order = res.order;
        Swal.fire({
            title: "Total Harga : Rp" + nilai,
            icon: 'success',
            text: "Nomor Pesanan : " + order,
            button: "Ok "
        }).then(function() {
            location.reload();
        });
    }
</script>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon"
        href="ttps://1.bp.blogspot.com/-on3HoOkuKcQ/YGnCI9WZxxI/AAAAAAAAINw/b7hIoPjdBosxD83vqfI9VfHTS0blZlrFACLcBGAsYHQ/s0/logo-kominfo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="wicaksu">
    <title>Aplikasi Pembantu</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">





    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4"
                    src="https://1.bp.blogspot.com/-on3HoOkuKcQ/YGnCI9WZxxI/AAAAAAAAINw/b7hIoPjdBosxD83vqfI9VfHTS0blZlrFACLcBGAsYHQ/s0/logo-kominfo.png"
                    alt="" height="100">
                <h2>Form Reset Device</h2>
            </div>
            <div class="accordion mb-4" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Cara Reset
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Tatacara peresetan IMEI/DEVICE/AKUN.</strong>
                            Untuk melakukan reset silahkan masukkan NIP/NIK yang terdaftar pada aplikasi presensi
                            online,
                            setelah itu silahkan klik <code>cek</code>, untuk melakukan pengecekan NIP/NIK jika NIP/NIK
                            terdaftar dan belum pernah dilakukan peresetan maka akan muncul nama dan OPD. Setelah muncul
                            nama dan OPD silahkan mengisi alasan kenapa ingin melakukan peresetan, jangan lupa untuk
                            membaca syarat dan ketentuan peresetan
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Syarat dan Ketentuan Peresetan
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>1. Peresetan hanya dapat dilakukan 1 kali pada setiap NIP/NIK.</p>
                            <p>2. Data peresetan akan di simpan pada database DISKOMINFO Kab. Madiun.</p>
                            <p>3. Peresetan hanya berlaku 1 kali apabila lebih dari itu maka harus diajukan surat resmi
                                ditujukan ke-DISKOMINFO Kab. Madiun dan deketahui oleh kepala masing-masing OPD.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Syarat dan Ketentuan Umum
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>1. Aplikasi presensi online Kab. Madiun akan melakukan tracking GPS setiap 5 menit sekali
                                apabila sedang atau dalam jam kerja.</p>
                            <p>2. Apabila dalam pemantauan sistem device tidak bergerak dalam radius tertentu maka
                                device dan akun akan di blokir, untuk pengaktifan kembali harus diajukan surat resmi
                                ditujukan ke-DISKOMINFO Kab. Madiun dan deketahui oleh kepala masing-masing OPD.</p>
                            <p>3. Syarat dan ketentuan sewaktu waktu dapat berubah tanpa adanya pemberitahuan.</p>
                            <p class="text-end">Kepala Diskominfo</p>
                            <p class="text-end">Drs. Sawung Rehtomo, M.Si</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
                @endif
                @if (\Session::has('error'))
                <div class="alert alert-error">
                    <ul>
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
                @endif
                <form class="needs-validation" novalidate method="post" action="save">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-12">
                            <label for="nip" class="form-label">Masukan NIP/NIK anda</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="nip" id="nip" required>

                                <button id="cek" class="btn btn-primary">Cek</button>

                                <div class="invalid-feedback">
                                    Mohon masukkan NIP atau NIK yang sesuai dengan aplikasi
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="userid" id='userid'>
                        <div class="col-sm-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" readonly disabled required>
                        </div>

                        <div class="col-sm-6">
                            <label for="opd" class="form-label">OPD</label>
                            <input type="text" name="opd" class="form-control" id="opd" readonly disabled required>
                        </div>


                        <div class="col-12">
                            <label for="alasan" class="form-label">Alasan</label>
                            <input type="text" name="alasan" class="form-control" id="alasan" required disabled>
                            <div class="invalid-feedback">
                                Mohon masukkan alasan untuk peresetan.
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="same-address" required disabled>
                        <label class="form-check-label" for="same-address">Saya menerima syarat dan ketentuan yang
                            berlaku</label>
                        <div class="invalid-feedback">
                            Harus tercentang.
                        </div>
                    </div>
                    <hr class="my-4">
                    <button id="confirm" class="w-100 btn btn-success btn-lg" type="submit" disabled>Kirim</button>
                </form>
            </div>
    </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017–2022 Wicaksu</p>
    </footer>
    </div>
    <script type="text/javascript">
        $("#cek").click(function (e) {
            e.preventDefault();

            var nip = $("input[name=nip]").val();
            console.log(nip);

            if (nip !== '') {
                $.ajax({
                    type: 'POST',
                    url: "{{ url('ceknip') }}",
                    data: {
                        nip: nip
                    },
                    success: function (data) {
                        //   alert(data.success);
                        if (typeof data.message == 'undefined') {
                            console.log(data);
                            $('#alasan').prop("disabled", false);
                            $('#same-address').prop("disabled", false);
                            $('#confirm').prop("disabled", false);
                            $('#nama').prop("disabled", false);
                            $('#opd').prop("disabled", false);

                            $("#nama").val(data.nama);
                            $("#opd").val(data.opd);
                            $("#userid").val(data.userid);
                        } else {
                            alert(data.message);
                        }
                    }
                });
            }
        });
    </script>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="form-validation.js"></script>
</body>

</html>
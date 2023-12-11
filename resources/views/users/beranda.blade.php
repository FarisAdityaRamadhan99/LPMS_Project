@extends('layouts.app')
@section('content')
    
    <section class="py-5" >
        <div class="container px-1">
            <div class="row">
                <div class="col-md-2 col-lg-6 col-lx-3 mx-auto mb-4">
                    <h2 class="text-success fw-bold pt-3">Layanan Pengaduan Masyarakat Sumenep</h2>
                    <p class="fs-5 pt-3 pb-4">LPMS hadir sebagai wadah bagi Masyarakat guna melaporkan adanya indikasi penyimpangan, korupsi, kolusi dan nepotisme yang dilakukan aparat pemerintah daerah dalam penyelenggaraan pemerintahan</p>
                    <a href="#" style="border-radius: 15px" class="btn btn-outline-success border-bottom-info">Buat Aduan</a>
                </div>
                <div class="col-md-2 col-lg-6 col-lx-3 text-center">
                    <img src="{{ asset('img/sumenep.jpg') }}" width="40%" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services py-5" style="background: #F3F3F3;">
        <div class="container">
            <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box">
                <div class="icon"><i class="bx bxs-edit-alt"></i></div>
                <h4 class="title"><a href="">Tulis Aduan</a></h4>
                <p class="description">Tulis aduan Anda dengan lengkap dan jelas melalui web atau aplikasi</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box">
                <div class="icon"><i class="bx bxs-hourglass-top"></i></div>
                <h4 class="title"><a href="">Tindak Lanjut</a></h4>
                <p class="description">Dalam waktu cepat instansi akan menindaklanjuti dan membalas aduan Anda.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box">
                <div class="icon"><i class="bx bxs-conversation"></i></div>
                <h4 class="title"><a href="">Tanggapan Balik</a></h4>
                <p class="description">Anda dapat menanggapi kembali balasan dari instansi berwenang.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box">
                <div class="icon"><i class="bx bxs-check-circle"></i></div>
                <h4 class="title"><a href="">Selesai</a></h4>
                <p class="description">Jika tindak lanjut sudah selesai maka instansi berwenang akan menutup aduan Anda.</p>
                </div>
            </div>

            </div>

        </div>
    </section>


@endsection
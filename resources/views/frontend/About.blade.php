@extends('layouts.customer')


@section('title', 'Tentang Kami - VapeNation')

@section('content')
<style>
    .btn-vapenation {
        background-color: #23314D;
        color: #fff;
    }
    .btn-vapenation:hover {
        background-color: #1a2338;
        color: #fff;
    }
    .section-title {
        font-weight: 700;
        font-size: 2rem;
        color: #23314D;
    }
    .feature-icon {
        font-size: 2.5rem;
        color: #23314D;
    }
</style>

<div class="container py-5 mt-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-4">
            <img src="{{asset('images/about.jpg')}}" class="img-fluid rounded-4 shadow" alt="Tentang VapeNation" style="height: 350px; object-fit: cover">
        </div>
        <div class="col-md-6">
            <h2 class="section-title">Selamat Datang di VapeNation</h2>
            <p class="text-muted mt-3">
                Kami adalah toko vape online yang menyediakan berbagai macam produk vape terbaik dan terpercaya. Mulai dari pod, liquid premium, hingga aksesoris lengkap untuk memenuhi kebutuhan gaya hidup vaping kamu.
            </p>
            <p class="text-muted">
                Dengan pengalaman dan komunitas yang kuat, VapeNation berkomitmen untuk memberikan pelayanan terbaik, harga bersaing, dan produk original berkualitas tinggi. Kami percaya vaping adalah bagian dari ekspresi diri dan kenyamanan.
            </p>
            <a href="{{ url('/shop') }}" class="btn btn-vapenation mt-3 px-4 py-2 rounded-3">Belanja Sekarang</a>
        </div>
    </div>

    <div class="text-center mb-4">
        <h3 class="section-title">Kenapa Pilih VapeNation?</h3>
        <p class="text-muted">Kami hadir dengan komitmen untuk memberikan yang terbaik untuk setiap vapers di Indonesia</p>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="p-4 shadow-sm border rounded-4 h-100">
                <div class="feature-icon mb-3">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h5 class="fw-semibold">Produk 100% Original</h5>
                <p class="text-muted">Kami hanya menjual produk yang legal dan terjamin kualitasnya.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 shadow-sm border rounded-4 h-100">
                <div class="feature-icon mb-3">
                    <i class="bi bi-truck"></i>
                </div>
                <h5 class="fw-semibold">Pengiriman Cepat</h5>
                <p class="text-muted">Order sebelum jam 3 sore, dikirim hari itu juga. Aman dan terpercaya.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="p-4 shadow-sm border rounded-4 h-100">
                <div class="feature-icon mb-3">
                    <i class="bi bi-people"></i>
                </div>
                <h5 class="fw-semibold">Komunitas Vapers Aktif</h5>
                <p class="text-muted">Gabung komunitas kami, sharing tips dan review bareng sesama pengguna.</p>
            </div>
        </div>
    </div>
</div>
@endsection

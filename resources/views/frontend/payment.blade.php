@extends('layouts.customer')
@section('title', 'Pembayaran')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h3 class="card-title mb-4 text-center text-primary">Instruksi Pembayaran</h3>

                    <div class="alert alert-warning">
                        <strong>Perhatian:</strong> Silakan transfer sesuai dengan total tagihan ke rekening di bawah ini.
                    </div>

                    <div class="mb-4">
                        <h5>Detail Pembayaran</h5>
                        <table class="table table-borderless">
                            <tr>
                                <th style="width: 150px;">Bank</th>
                                <td>: <strong>BCA</strong></td>
                            </tr>
                            <tr>
                                <th>No. Rekening</th>
                                <td>: <strong>1234567890</strong></td>
                            </tr>
                            <tr>
                                <th>Atas Nama</th>
                                <td>: <strong>PT Vapenation Abadi</strong></td>
                            </tr>
                            <tr>
                                <th>Total Pembayaran</th>
                                <td>: <span class="text-danger fw-bold fs-5">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span></td>
                            </tr>
                            <tr>
                                <th>Nomor Order</th>
                                <td>: <span class="text-dark fw-semibold">{{ $order->tracking_no }}</span></td>
                            </tr>
                        </table>
                    </div>

                    <hr>

                    <p class="mb-4">Setelah melakukan pembayaran, Anda bisa langsung konfirmasi melalui WhatsApp dengan mengklik tombol di bawah ini.</p>

                    @php
                        $whatsappNumber = '6281234567890'; // Ganti dengan nomor WA admin (format internasional tanpa +)
                        $message = "Halo Admin, saya telah melakukan pembayaran untuk Order No: " . $order->tracking_no . ". Mohon konfirmasinya. Terima kasih.";
                        $whatsappLink = "https://wa.me/{$whatsappNumber}?text=" . urlencode($message);
                    @endphp

                    <div class="text-center">
                        <a href="{{ $whatsappLink }}" target="_blank" class="btn btn-success btn-lg shadow-sm px-4">
                            <i class="bi bi-whatsapp"></i> Konfirmasi via WhatsApp
                        </a>
                    </div>

                    <p class="mt-4 text-muted text-center">Admin akan segera menghubungi Anda setelah konfirmasi berhasil dikirim.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

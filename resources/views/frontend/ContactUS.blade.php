@extends('layouts.customer')

@section('title', 'Hubungi Kami - VapeNation')

@section('content')
<style>
    .contact-container {
        background-color: #f8f9fc;
        padding: 60px 20px;
    }

    .contact-heading {
        text-align: center;
        color: #23314D;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .contact-description {
        text-align: center;
        color: #555;
        max-width: 600px;
        margin: 0 auto 40px;
        font-size: 1rem;
    }

    .contact-form {
        background-color: #fff;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
        max-width: 800px;
        margin: 0 auto;
    }

    .form-label {
        font-weight: 600;
        color: #23314D;
    }

    .form-control, textarea {
        border-radius: 10px;
        border: 1px solid #ccc;
        font-size: 0.95rem;
        padding: 10px 14px;
    }

    .form-control:focus, textarea:focus {
        border-color: #23314D;
        box-shadow: 0 0 0 0.15rem rgba(35, 49, 77, 0.2);
    }

    .btn-primary-custom {
        background-color: #23314D;
        border: none;
        color: white;
        padding: 12px 30px;
        border-radius: 10px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btn-primary-custom:hover {
        background-color: #1c2537;
    }

    .info-section {
        margin-top: 60px;
        background: white;
        border-radius: 16px;
        padding: 40px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }

    .info-item {
        margin-bottom: 20px;
    }

    .info-item h5 {
        color: #23314D;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .info-item p {
        margin: 0;
        color: #555;
    }

    @media (max-width: 768px) {
        .contact-form, .info-section {
            padding: 20px;
        }
    }
</style>

<div class="contact-container mt-5">
    <h2 class="contact-heading">Hubungi Kami</h2>
    <p class="contact-description">Punya pertanyaan seputar produk atau pemesanan? Tim VapeNation siap membantu Anda. Silakan isi formulir di bawah ini dan kami akan segera menghubungi Anda.</p>

    <!-- Contact Form -->
    <div class="contact-form">
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama lengkap Anda" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Subjek</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Judul pesan" required>
            </div>

            <div class="mb-4">
                <label for="message" class="form-label">Pesan</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tulis pesan Anda..." required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary-custom">Kirim Pesan</button>
            </div>
        </form>
    </div>

    <!-- Informasi Kontak -->
    <div class="info-section">
        <div class="info-item">
            <h5>Alamat Toko</h5>
            <p>Jl. Vape Sejahtera No. 45, Jakarta Selatan, DKI Jakarta</p>
        </div>

        <div class="info-item">
            <h5>Telepon</h5>
            <p>+62 812-3456-7890</p>
        </div>

        <div class="info-item">
            <h5>Email</h5>
            <p>support@vapenation.id</p>
        </div>

        <div class="info-item">
            <h5>Jam Operasional</h5>
            <p>Senin - Sabtu, 10.00 - 21.00 WIB</p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
 $('.message').click(function(e){
            e.preventDefault();
            var name = $('#name').val();
            var email =$('#email').val();
            var subject =$('#subject').val();
            var message = $('#message').val();


            console.log(name , email , subject , message)

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                method : "POST",
                url : "/sendMessage",
                data : {
                    'name': name,
                    'email': email,
                    'subject': subject,
                    'message': message,
                },
                success: function(response)
                {
                    if(response.status === "Please Login First...")
                    {

                        swal("Oops...", `${response.status}`, "error");
                    }
                    else if(response.status === "Please Verify you Email")
                    {

                        swal("Oops...", `${response.status}`, "error");
                    }
                    else if(response.status === undefined)
                    {

                        swal("Oops...", `We are unable to deliver your message`, "info");
                    }
                    else if(response.status === 'Kindly Fill Form Correctly')
                    {

                        swal("Oops...", `${response.status}`, "error");
                    }
                    else
                    {
                        swal("Done!", `${response.status}`, "success");
                    }
                }
            })
        })

</script>
@endsection


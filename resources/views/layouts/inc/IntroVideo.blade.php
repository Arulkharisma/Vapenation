<style>
   @media only screen and (max-width: 992px) {
      .banner img{
         height: 70vh !important;
         object-fit: cover
      }
      .banner a{
         padding: 15px !important;
         fontsize: 1rem !important;
      }
   }
   @media only screen and (max-width: 576px) {
      .banner a{
         padding: 10px !important;
         fontsize: 0.8rem !important;
      }
   }
</style>
<div class="container-fluid p-0 bg-dark position-relative">
   <div class=" position-relative w-100 h-100  banner">
      <img src="{{asset('images/banner2.jpg')}}"  class="w-100 h-100" style="margin-top: 70px"/>
      <a href="#newarrival" class="px-4 py-3 rounded text-white border-0" style="background-color: #F7AD19; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"> <i class="fa-solid fa-cart-shopping me-2" aria-hidden="true"></i>Pesan Sekarang</a>
   </div>
</div>

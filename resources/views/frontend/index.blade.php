@extends('layouts.customer')


@section('title')
    Vapenation
@endsection

@section('content')
    @include('layouts.inc.IntroVideo')
    <div class="py-2">
        <div class="container  d-flex align-items-center justify-content-around p-4">
            <div class="border border-dark " style="width:20rem; background:black;"></div>
            <h3 class="p-3 fw-bold text-center">Top Categories</h3>
            <div class="border border-dark " style="width:20rem; background:black;"></div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach ($category as $cate )
                <div class="card col-md-4 " style="border:none;">
                    <a href="{{url(asset('view-category/'.$cate->slug))}}">
                        <div class="card-body zoom postion-relative" >
                            <img src="{{asset('upload/category/'.$cate->image)}}"   class="w-100 lazy rounded" height="350px"  alt="" style="object-fit: cover">
                            <div class="text-light  position-absolute top-50 start-50  translate-middle">
                                <h4 style="letter-spacing:3px; ">{{$cate->name}}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
    
    <div class="container  d-flex align-items-center justify-content-around p-4">
        <div class="border border-dark " style="width:20rem; background:black;"></div>
        <h3 class="p-3 fw-bold text-center" id="newarrival">NEW ARRIVALS</h3>
        <div class="border border-dark " style="width:20rem; background:black;"></div>
    </div>
    <div class="py-5" id="products">
        <div class="container">
            <div class="row justify-center">
                @foreach ($product as $item )
                <div class="col-md-4 col-lg-3 col-sm-10 mt-2">
                        <a  class="d-flex link-dark w-100"  href="{{url(asset('view-product/'.$item->slug))}}" style="height: 100%">
                            <div class="card hello-card w-80 h-full">
                                <img src="{{asset('upload/product/'.$item->image)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">{{$item->name}}</h6>
                                        <span href="#" class=" pe-auto float-start">Rp <s>{{$item->original_price}}</s></span>
                                        <span href="#" class=" pe-auto float-end">Rp {{$item->selling_price}}</span>
                                </div>
                            </div>
                        </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection



@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- custom JS code after importing jquery and owl -->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots:false,
            disable:false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>

    <script>
        swal("Done!", `${response.status}`, "success");
    </script>
@endsection
@section('css')
  <style>
    
    .owl-nav
    {
        display: block !important; 
    }
    .owl-nav button
    {
        font-size: 2rem !important;
    }
  

  </style>



@endsection



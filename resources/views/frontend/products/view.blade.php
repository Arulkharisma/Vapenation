@extends('layouts.customer')
@section('title',$product->name)

@section('content')
    <div class="py-5">

    </div>
  <div class="py-3 mb-3 mt-2 shadow-sm backgroundofroutes border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('category')}}">Collection</a>/
            <a href="{{url('view-category/'.$product->category->slug)}}">{{$product->category->name}}</a>/
            <a href="{{url('view-category/'.$product->category->slug.'/'.$product->slug)}}">{{$product->name}}</a>
        </h6>
    </div>
  </div>
  {{-- <div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('upload/product/'.$product->image)}}" alt="" class="w-100">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$product->name}}
                        <label for="" style="font-size: 1rem;" class="float-end badge text-white bg-dark  trending_tag">{{$product->trending == "1" ? 'Trending': '' }}</label>
                    </h2>
                    <hr>
                    <label for="" class="me-3">Harga Asli  : <s>Rp {{$product->original_price}}</s></label>
                    <label for="" class="fw-bold">Harga Diskon  : Rp {{$product->selling_price}}</label>
                    <p class="mt-3">
                        {!! $product->small_description !!}
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam labore quibusdam voluptate repudiandae accusamus dicta aut voluptates doloremque perspiciatis beatae!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente incidunt ducimus culpa vita
                    </p>
                    <hr>
                    @if($product->qty > 0)
                        <label for="" class="badge bg-dark text-white">In Stock</label>
                    @else
                        <label for="" class="badge bg-danger">Out Of Stock</label>
                    @endif
                    <div class="row mt-2 justify-between align-items-center">
                        <div class="col-lg-3 col-md-3">
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                            <label for="quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" readonly name="quantity" value="1" class="form-control quantity-input bg-light text-center">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 d-flex justify-content-end">
                            @if($product->qty > 0)
                            <button class="px-3 py-2 rounded text-white border-0 " style="background-color: black">Add to Cart <i class="fa-solid fa-cart-plus"></i></button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div> --}}

  <div class="container my-5">
    <div class="card shadow-lg border-0 product_data">
        <div class="card-body p-4">
            <div class="row g-4 align-items-start">
                <!-- Gambar Produk -->
                <div class="col-md-5 text-center">
                    <img src="{{ asset('upload/product/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded shadow-sm" style="max-height: 400px; object-fit: contain;">
                </div>

                <!-- Detail Produk -->
                <div class="col-md-7">
                    <h2 class="fw-bold text-dark">
                        {{ $product->name }}
                        @if($product->trending == "1")
                            <span class="badge bg-dark text-white ms-2">Trending</span>
                        @endif
                    </h2>

                    <div class="my-3">
                        <span class="text-muted me-3">Harga Asli: <s>Rp {{ $product->original_price }}</s></span>
                        <span class="fw-bold text-success">Harga Diskon: Rp {{ $product->selling_price }}</span>
                    </div>

                    <div class="text-muted small mb-3" style="line-height: 1.6">
                        {!! $product->small_description !!}
                    </div>

                    <hr>

                    <!-- Stok -->
                    <div class="mb-3">
                        @if($product->qty > 0)
                            <span class="badge bg-dark text-white">In Stock</span>
                        @else
                            <span class="badge bg-danger">Out Of Stock</span>
                        @endif
                    </div>

                    <!-- Kuantitas & Tombol -->
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-5 mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <div class="input-group">
                                <button class="input-group-text decrement-btn bg-light border">-</button>
                                <input type="text" readonly name="quantity" value="1" class="form-control text-center quantity-input bg-white border">
                                <button class="input-group-text increment-btn bg-light border">+</button>
                            </div>
                            <input type="hidden" value="{{ $product->id }}" class="prod_id">
                        </div>
                        <div class="col-lg-8 col-md-7 text-end">
                            @if($product->qty > 0)
                                <button class="btn text-white px-4 py-2 addToCartButton" style="background-color: #000;">
                                    Add to Cart <i class="fa-solid fa-cart-plus ms-1"></i>
                                </button>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

  <div class="py-2">
    
  </div>

@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        $('.addToCartButton').click(function(e){
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.quantity-input').val();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                method : "POST",
                url : "/add-to-cart",
                data : {
                    'product_id': product_id,
                    'product_qty': product_qty
                },
                success: function(response)
                {
                    if(response.status === "Please Login First...")
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


        $('.increment-btn').click(function (e) {
            e.preventDefault();

            var inc_value = $('.quantity-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                $('.quantity-input').val(value);
            }
        }) 
        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            console.log('hello')

            var inc_value = $('.quantity-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $('.quantity-input').val(value);
            }
        }) 
    }) 
</script>
@endsection
@extends('layouts.customer')
@section('title')
   {{$category->name}}
@endsection

@section('content')
<div class="py-5">

</div>

<div class="py-3 mb-3 mt-2 shadow-sm backgroundofroutes border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('category')}}">Collections</a>/
            <a >{{$category->name}}</a>
        </h6>
    </div>
  </div>
    <div class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$category->name}}</h2>
                </div>
                <div class="row justify-content-center" style="row-gap: 10px">
                    @foreach ($product as $prod )
                        <div class="col-md-4 col-lg-3 col-sm-10 mt-2">
                            <a class="d-flex link-dark w-100" href="{{url(asset('view-category/'.$category->slug.'/'.$prod->slug))}}" style="height: 100%">
                                <div class="card hello-card w-80 h-full">
                                    <img src={{asset('storage/product/'.$prod->image)}} alt="no-image">
                                    <div class="card-body">
                                        <h5 class="text-center">{{$prod->name}}</h5>
                                        <span class="pe-auto float-start">Rp {{ $prod->selling_price }}</span>
                                        <span class="pe-auto float-end">Rp<s>{{ $prod->selling_price }}</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
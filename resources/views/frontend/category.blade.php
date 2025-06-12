@extends('layouts.customer')
@section('title')
    Category
@endsection

@section('content')
{{-- <div class="py-5"></div> --}}
    <div class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Semua Kategori</h2>
                </div>
                <div class="row ">
                    @foreach ($category as $cate )
                        <div class="card col-md-4 p-0" style="border: none">
                            <a href="{{url(asset('view-category/'.$cate->slug))}}">
                                <div class="card-body zoom postion-relative" >
                                    <img src="{{asset('storage/category/'.$cate->image)}}"   class="w-100 lazy rounded" height="350px"  alt="" style="object-fit: cover">
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
    </div>
    <div class="py-5 my-5">

    </div>
@endsection

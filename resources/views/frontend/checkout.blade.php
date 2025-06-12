@extends('layouts.customer')

@section('title')
   Check Out
@endsection

@section('content')
<div class="py-5">

</div>
    <div class="container mt-3">
        <form action="{{url('place-order')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5>Basic Detail</h5>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6 my-2">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="fname" class="form-control" value="{{Auth::user()->name}}" placeholder="First Name" required>
                                </div>
                                <div class="col-md-6  my-2">
                                    <label for="firstname">Last Name</label>
                                    <input type="text" name="lname" class="form-control" value="{{Auth::user()->name}}"   placeholder="First Name" required>
                                </div>
                                <div class="col-md-6  my-2">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}"  placeholder="email@example.com" required>
                                </div>
                                <div class="col-md-6  my-2">
                                    <label for="email">No Hp</label>
                                    <input type="number" name="phoneno" class="form-control"  value="{{Auth::user()->phoneno}}"  placeholder="92313587420" required>
                                </div>
                                <div class="col-md-6  my-2">
                                    <label for="email">Alamat 1</label>
                                    <input type="text" name="address1" class="form-control"  value="{{Auth::user()->address1}}"  placeholder="Masukkan Alamat 1" required>
                                </div>
                                <div class="col-md-6  my-2">
                                    <label for="email">Alamat 2</label>
                                    <input type="text" name="address2" class="form-control" value="{{Auth::user()->address2}}"   placeholder="Masukkan alamat 2" required>
                                </div>
                                <div class="col-md-6  my-2">
                                    <label for="email">Kota</label>
                                    <input type="text" name="city" class="form-control" value="{{Auth::user()->city}}"   placeholder="Jakarta" required>
                                </div>
                                <div class="col-md-6  my-2">
                                    <label for="email">State</label>
                                    <input type="text" name="state" class="form-control"  value="{{Auth::user()->state}}"  placeholder="Cibubur" required>
                                </div>
                                <div class="col-md-6  my-2">
                                    <label for="email">Negara</label>
                                    <input type="text" name="country" class="form-control" value="{{Auth::user()->country}}"   placeholder="Indonesia" required>
                                </div>
                                <div class="col-md-6  my-2">
                                    <label for="email">Kode Pos</label>
                                    <input type="number" name="pincode" class="form-control" value="{{Auth::user()->pincode}}"   placeholder="85416" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card border-0 ">
                        <div class="card-body">
                            <h5>Order Detail</h5>
                            <hr>
                            <table class="table table-stripped">
                                <tbody>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    @foreach ($cartitem as $item)
                                        <tr>
                                            <td>{{$item->products->name}}</td>    
                                            <td>{{$item->prod_qty}}</td>    
                                            <td>{{$item->products->selling_price}}</td>    
                                            <td></td>    
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        <hr>
                        <button type="submit" class="btn btn-outline-primary float-end">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('css')
<style>

.checkout-form input
{

    font-size: 1rem;
    padding: 10px;
    font-weight: 400;
}
    
.checkout-form label
{
    font-size: .9rem;
    font-weight: 700;
}
    
</style>
@endsection
@extends('master')

@section('page-name')
Home
@endsection

@section('main-content')
<section class="py-5">
  <div class="container">
    <div class="row">


        <div class="col-md-6">
          <div class="card card-body">
            <img src="{{ asset($product->image)}}" alt="" height="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-body">
              <h4>{{$product->name}}</h4>
              <p>Tk. {{ $product->price}}</p>
              <hr>
              <p>{{ $product->description }}</p>
            </div>
          </div>
        </div>

    </div>
  </div>
</section>
@endsection
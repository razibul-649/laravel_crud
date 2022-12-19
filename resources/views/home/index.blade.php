@extends('master')

@section('page-name')
Home
@endsection

@section('main-content')
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center text-success">Latest Products</h3>
      </div>
      @foreach($products as $product)
        <div class="col-md-3 mb-3">
          <div class="card h-100">
            <img src="{{ asset($product->image)}}" alt="" height="200">
            <div class="card-body">
              <h4>{{$product->name}}</h4>
              <p>Tk. {{ $product->price}}</p>
              <hr>
              <a href="{{ route('product.details', ['id' => $product->id]) }}" class="btn btn-outline-success px-5">Details...</a>
            </div>
          </div>
        </div>
      @endforeach
      <div class="col-md-12">
        <h3 class="text-center text-success">Featured Products</h3>
      </div>

      <div class="col-md-12">
        <h3 class="text-center text-success">Others Product</h3>
      </div>
    </div>
  </div>
</section>
@endsection
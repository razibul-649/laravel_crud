@extends('master')

@section('page-name')
Edit Product
@endsection

@section('main-content')
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header">Edit Product Form</div>
          <div class="card-body">
            @if( Session::get('message.status'))
              <h3 class="text-center text-success">{{ Session::get('message.msg')}}</h3>
            @else
              <h3 class="text-center text-danger">{{ Session::get('message.msg')}}</h3>
            @endif
            <form action="{{ route('product.update', ['id' => $product['id']]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label for="" class="col-md-3">Product Name</label>
                <div class="col-md-9">
                  <input type="text" value="{{ $product['name'] }}" class="form-control" name="name" required placeholder="Product Name...">
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-md-3">Product Description</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="description" required placeholder="Description...">{{ $product['description'] }}</textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-md-3">Product Price</label>
                <div class="col-md-9">
                  <input type="number" value="{{ $product['price'] }}" class="form-control" name="price" required placeholder="Price...">
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-md-3">Product Image</label>
                <div class="col-md-9">
                  <input type="file" class="form-control" name="image">
                  <img src="{{ asset($product['image']) }}" alt="" width="200" class="img-thumbnail">
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-md-3"></label>
                <div class="col-md-9">
                  <input type="reset" class="btn btn-outline-danger me-3" value="Reset">
                  <input type="submit" class="btn btn-outline-success px-3" name="updateProduct" value="Update Product" required>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
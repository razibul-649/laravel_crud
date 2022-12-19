@extends('master')

@section('page-name')
Manage Product
@endsection

@section('main-content')
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header text-center text-success">All Product Information</div>
          <div class="card-body">
            @if( Session::get('message.status'))
              <h3 class="text-center text-success">{{ Session::get('message.msg')}}</h3>
            @else
              <h3 class="text-center text-danger">{{ Session::get('message.msg')}}</h3>
            @endif
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>SL NO</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>Tk. {{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                      <img src="{{ asset('/') }}{{ $product->image }}" alt="" class="img-thumbnail" width="200">
                    </td>
                    <td>
                      <a href="{{ route('product.edit', ['id' => $product->id ])}}" class="btn btn-success btn-sm">Edit</a>
                      
                      <a href="{{ route('product.delete', ['id' => $product->id ]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete product?')">Delete</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
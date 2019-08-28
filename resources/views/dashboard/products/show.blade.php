@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Product Details
        @endslot

        @if (session('product_status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('product_status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        
        <div class="media mb-4">
          <img class="align-self-start mr-3 img-fluid dashboard-product-show-img" src="{{ $product->image_url }}" alt="">
          <div class="media-body">
            <h3 class="h4">{{ $product->name }}</h3>
            <p class="text-muted">${{ $product->price }}</p>
            <p>Quantity: {{ $product->quantity_in_stock }}</p>
            <p>Category: <a href="{{ route('categories.show', $product->category->id) }}">{{ $product->category->name }}</a></p>
          </div>
        </div>
        <a class="btn btn-secondary" href="{{ route('products.edit', [$product->id]) }}">Edit Product</a>
        <a class="btn btn-primary" href="{{ route('products.index') }}">Back to Products</a>

        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input type="submit" class="btn btn-danger mt-2" value="Delete Product">
        </form>
    @endcomponent
@endsection

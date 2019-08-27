@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Products
        @endslot
        
        @slot('action')
            <a class="btn btn-primary" href="{{ route('products.create') }}">Add New</a>
        @endslot

        @if (session('product_status'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              {{ session('product_status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-3 pb-3">
                    <div class="card">
                      <img src="{{ $product->image_url }}" alt="">
                        <div class="card-body">
                            <h3 class="h5">{{ $product->name }}</h3>
                            <p class="card-subtitle text-muted">{{ $product->price }}</p>
                            <p>Quantity: {{ $product->quantity_in_stock }}</p>
                            <a class="card-link" href="{{ route('products.show', $product->id) }}">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endcomponent
@endsection

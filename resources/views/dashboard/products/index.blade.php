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
        
        @foreach ($categories as $category)
          @if (count($category->products) > 0)
           <section>
             <h3 class="h3 mb-3">{{ $category->name }}</h3>
             <div class="row">
                 @foreach ($category->products as $product)
                     <div class="col-sm-3 pb-3">
                         <div class="card">
                           <img class="img-fluid" src="{{ $product->image_url }}" alt="">
                             <div class="card-body">
                                 <h4 class="h5">{{ $product->name }}</h4>
                                 <p class="card-subtitle text-muted">${{ $product->price }}</p>
                                 <p>Quantity: {{ $product->quantity_in_stock }}</p>
                                 <a class="card-link" href="{{ route('products.show', $product->id) }}">View Product</a>
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
           </section> 
          @endif           
        @endforeach
    @endcomponent
@endsection

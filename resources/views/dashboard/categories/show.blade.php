@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Category Details
        @endslot

        @if (session('category_status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('category_status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        
        <div class="card">
            <div class="card-body">
                <h2 class="h3">{{ $category->name }}</h2>
                @if (isset($category->description))
                  <p class="card-text">{{ $category->description }}</p>
                @else
                  <p class="card-text">No description.</p>
                @endif
                <a class="btn btn-secondary" href="{{ route('categories.edit', [$category->id]) }}">Edit Category</a>
                <a class="btn btn-primary" href="{{ route('categories.index') }}">Back to Categories</a>

                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="submit" class="btn btn-danger mt-2" value="Delete Category">
                </form>
            </div>
        </div>

        @if (count($category->products) > 0)
         <section class="mt-4">
           <div class="row">
               @foreach ($category->products as $product)
                   <div class="col-sm-3 pb-3">
                       <div class="card">
                         <img class="img-fluid" src="{{ $product->image_url }}" alt="">
                           <div class="card-body">
                               <h3 class="h5">{{ $product->name }}</h3>
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
    @endcomponent
@endsection

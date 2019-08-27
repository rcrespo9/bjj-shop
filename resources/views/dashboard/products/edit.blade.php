@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Edit Product
        @endslot

        <h3 class="h5">Editing {{ $product->name }}</h3>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
          {{ method_field('PATCH') }}
          {{ csrf_field() }}
          <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name" value="{{ $product->name }}" required>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category_id" id="category" required>
              <option value="" disabled>Please select a category</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected='selected' @endif>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" step=".01" value="{{ $product->price }}" required>
          </div>
          <div class="form-group">
            <label for="quantity_in_stock">Quantity In Stock</label>
            <input type="number" class="form-control" id="quantity_in_stock" name="quantity_in_stock" step="1" value="{{ $product->quantity_in_stock }}" required>
          </div>
          <div class="form-group">
            <label for="image_url">Image URL</label>
            <input class="form-control" id="image_url" name="image_url" value="{{ $product->image_url }}">
          </div>
          <input class="btn btn-primary" type="submit" value="Update">
          <a class="btn btn-secondary" href="{{ route('products.show', $product->id) }}">Cancel</a>
        </form>
    @endcomponent
@endsection

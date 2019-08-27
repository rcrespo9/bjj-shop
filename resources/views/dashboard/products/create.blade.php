@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Create New Product
        @endslot

        <form action="{{ route('products.store') }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" name="category_id" id="category" required>
              <option value="" disabled>Please select a category</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" step=".01" required>
          </div>
          <div class="form-group">
            <label for="quantity_in_stock">Quantity In Stock</label>
            <input type="number" class="form-control" id="quantity_in_stock" name="quantity_in_stock" step="1" required>
          </div>
          <div class="form-group">
            <label for="image_url">Image URL</label>
            <input class="form-control" id="image_url" name="image_url">
          </div>
          <input class="btn btn-primary" type="submit" value="Submit">
          <a class="btn btn-secondary" href="{{ route('products.index') }}">Cancel</a>
        </form>
    @endcomponent
@endsection

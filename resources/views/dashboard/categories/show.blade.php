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
                <p class="card-text">{{ $category->description }}</p>
                <a class="btn btn-secondary" href="{{ route('categories.edit', [$category->id]) }}">Edit Category</a>
                <a class="btn btn-primary" href="{{ route('categories.index') }}">Back to Categories</a>

                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="submit" class="btn btn-danger mt-2" value="Delete Category">
                </form>
            </div>
        </div>
    @endcomponent
@endsection

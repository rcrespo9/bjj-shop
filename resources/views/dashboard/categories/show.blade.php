@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Category Detail Page
        @endslot
        
        <div class="card">
            <div class="card-body">
                <h2 class="h3">{{ $category->name }}</h2>
                <p class="card-text">{{ $category->description }}</p>
                <a class="btn btn-secondary" href="{{ route('categories.edit', [$category->id]) }}">Edit Category</a>
                <a class="btn btn-primary" href="{{ route('categories.index') }}">Back to Categories</a>
            </div>
        </div>
    @endcomponent
@endsection

@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Categories
        @endslot
        
        @slot('action')
            <a class="btn btn-primary" href="{{ route('categories.create') }}">Add New</a>
        @endslot

        @if (session('category_status'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              {{ session('category_status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-sm-3 pb-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="h5">{{ $category->name }}</h3>
                            <p class="card-text">{{ str_limit($category->description, $limit = 40, $end = '...') }}</p>
                            <a class="card-link" href="{{ url('dashboard/categories/'.$category->id) }}">See Category</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endcomponent
@endsection

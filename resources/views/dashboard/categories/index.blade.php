@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Categories
        @endslot
        
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-sm-3 pb-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="h5">{{ $category->name }}</h3>
                            <p class="card-text">{{ $category->description }}</p>
                            <a class="btn btn-primary" href="{{ url('dashboard/categories/'.$category->id) }}">See Category</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endcomponent
@endsection

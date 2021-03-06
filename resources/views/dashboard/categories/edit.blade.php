@extends('layouts.app')

@section('content')
    @component('components.dashboard')
      @slot('title')
          Edit Category
      @endslot

      <h3 class="h5">Editing {{ $category->name }}</h3>
      <form action="{{ route('categories.update', $category->id) }}" method="POST">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Name</label>
          <input class="form-control" value="{{ $category->name }}" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" rows="4">{{ $category->description }}</textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Update">
        <a class="btn btn-secondary" href="{{ route('categories.show', $category->id) }}">Cancel</a>
      </form>
    @endcomponent
@endsection

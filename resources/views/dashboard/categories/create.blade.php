@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Create New Category
        @endslot

        <form action="{{ route('categories.store') }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="4"></textarea>
          </div>
          <input class="btn btn-primary" type="submit" value="Submit">
          <a class="btn btn-secondary" href="{{ route('categories.index') }}">Cancel</a>
        </form>
    @endcomponent
@endsection

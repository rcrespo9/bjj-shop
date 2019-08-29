@extends('layouts.app')

@section('content')
@component('components.shop')
  @slot('title')
    Thanks
  @endslot

  <div class="alert alert-success w-50 mx-auto">Thanks for your order! <a href="{{ url('/') }}">Buy more.</a></div>
@endcomponent
@endsection

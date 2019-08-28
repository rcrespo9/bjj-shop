@extends('layouts.app')

@section('content')
@component('components.shop')
  @slot('title')
    Checkout
  @endslot
@endcomponent
@endsection

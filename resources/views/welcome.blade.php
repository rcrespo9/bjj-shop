@extends('layouts.app')

@section('content')
@component('components.shop')
  @slot('title')
    Shop
  @endslot

  <shop></shop>
@endcomponent
@endsection

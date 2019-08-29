@extends('layouts.app')

@section('content')
@component('components.shop')
  @slot('title')
    Thanks
  @endslot

  Thanks!
@endcomponent
@endsection

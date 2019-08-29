@extends('layouts.app')

@section('content')
@component('components.shop')
  @slot('title')
    Checkout
  @endslot

  <div class="card w-50 mx-auto">
    <div class="card-body">
      <form action="{{ route('orders.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="contact_name">Name</label>
          <input class="form-control" type="text" id="contact_name" name="contact_name" required>
        </div>
        <div class="form-group">
          <label for="company">Company</label>
          <input class="form-control" type="text" id="company" name="company">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input class="form-control" type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-3">
              <label for="city">City</label>
              <input class="form-control" type="text" id="city" name="city" required>
            </div>
            <div class="col-sm-3">
              <label for="state">State</label>
              <input class="form-control" type="text" id="state" name="state" required>
            </div>
            <div class="col-sm-3">
              <label for="country">Country</label>
              <input class="form-control" type="text" id="country" name="country" required>
            </div>
            <div class="col-sm-3">
              <label for="zip_code">Zip code</label>
              <input class="form-control" type="text" id="zip_code" name="zip_code" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input class="form-control" type="text" id="phone" name="phone" required>
        </div>
        <checkout></checkout>
        <input class="btn btn-primary checkout-submit" type="submit" value="Submit">
      </form>
    </div>
  </div>
@endcomponent
@endsection

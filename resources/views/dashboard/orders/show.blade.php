@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Order Details
        @endslot

        @php
          $order_details = json_decode(json_encode($order->order_details));

          $total_products = array_reduce($order_details, function($carry, $item) {
            return $carry + $item->quantity_ordered;
          });
          $total_price = array_reduce($order_details, function($carry, $item) {
            return $carry + ($item->quantity_ordered * $item->price_each);
          })
        @endphp

        @if (session('order_status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('order_status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        
        <div class="card">
            <div class="card-body">
                <h2 class="h3">Order No. {{ $order->id }}</h2>
                <p>Order Status: {{ $order->is_shipped ? 'Shipped' : 'Not Shipped' }}</p>
                <h3 class="h4 mb-2">Products Ordered</h3>
                <ul class="list-unstyled">
                  @foreach ($order->order_details as $order_detail)
                    @php
                      $total_order_detail_price = $order_detail->quantity_ordered * $order_detail->price_each            ;         
                    @endphp

                    <li>
                      <h4 class="h5 mb-0">{{ $order_detail->product->name }}</h4>
                      <p class="mb-0">Quantity: {{ $order_detail->quantity_ordered }}</p>
                      <p>Total Price: ${{ number_format((float)$total_order_detail_price, 2, '.', '') }}</p>
                    </li>
                  @endforeach
                </ul>

                <p class="mb-0">Total Products: {{ $total_products }}</p>
                <p>Total Order Price: ${{ number_format((float)$total_price, 2, '.', '') }}</p>
                
                @if (!$order->is_shipped) {
                  <form class="mb-4" action="{{ route('orders.update', $order->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group form-check mb-0">
                      <input type="checkbox" class="form-check-input" id="is_shipped" value="1">
                      <input type="hidden" name="is_shipped" value="1">
                      <label class="form-check-label" for="is_shipped">Shipped?</label>
                    </div>
                    <input type="hidden" name="ship_date" value="{{ date("Y-m-d H:i:s") }}">
                    <input type="submit" class="btn btn-success mt-2" value="Ship Order">
                  </form>
                }
                @endif

                <a class="btn btn-primary" href="{{ route('orders.index') }}">Back to Orders</a>
                
                @if (!$order->is_shipped) {
                  <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger mt-2" value="Delete Order">
                  </form>
                @endif
            </div>
        </div>
    @endcomponent
@endsection

@extends('layouts.app')

@section('content')
    @component('components.dashboard')
        @slot('title')
            Orders
        @endslot

        @if (session('order_status'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              {{ session('order_status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        
        <div class="row">
            @foreach ($orders as $order)
                @php
                  $order_details = json_decode(json_encode($order->order_details));

                  $total_products = array_reduce($order_details, function($carry, $item) {
                    return $carry + $item->quantity_ordered;
                  });
                  $total_price = array_reduce($order_details, function($carry, $item) {
                    return $carry + ($item->quantity_ordered * $item->price_each);
                  })
                @endphp

                <div class="col-sm-3 pb-3">
                    <div class="card text-white {{ $order->is_shipped ? 'bg-success' : 'bg-secondary' }}">
                        <div class="card-header">Order Status: {{ $order->is_shipped ? 'Shipped' : 'Not Shipped' }}</div>
                        <div class="card-body">
                            <h3 class="h5">Order No. {{ $order->id }}</h3>
                            <p class="card-text mb-1">Total Products: {{ $total_products }}</p>
                            <p class="card-text">Total Order Price: ${{ number_format((float)$total_price, 2, '.', '') }}</p>
                            <a class="card-link text-white" href="{{ url('dashboard/orders/'.$order->id) }}">View Order</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endcomponent
@endsection

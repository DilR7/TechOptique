@extends('admin.layouts.template')
@section('page_title')
    Pending Orders - TechOptique
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Pending Orders</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="index.html" class="text-muted">Apps</a></li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Pending Orders</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">User Id</th>
                            <th scope="col">Shipping Information</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Pay</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border border-dark">
                        @foreach ($pending_orders as $order)
                            <tr>
                                @php
                                    $product_name = App\Models\Product::where('id', $order->product_id)->value(
                                        'product_name',
                                    );
                                @endphp
                                <td>{{ $order->user_id }}</td>
                                <td>
                                    <ul>
                                        <li>Phone Number - {{ $order->shipping_phoneNumber }}</li>
                                        <li>City - {{ $order->shipping_city }}</li>
                                        <li>Postal Code - {{ $order->shipping_postalCode }}</li>
                                    </ul>
                                </td>
                                <td>{{ $product_name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>
                                    <div>
                                        <a href="" class="btn waves-effect waves-light btn-outline-success">Confirm
                                            Order</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('cancelorder', $order->id) }}"
                                            class="btn waves-effect waves-light btn-outline-danger mt-2">Cancel Order</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

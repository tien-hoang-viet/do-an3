@extends('admin.master')
@section('title')
    Order Management
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Order date</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Total price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $key => $payment)
                            <tr style="height: 65px">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ date('d-m-Y', strtotime($payment->order->date)) }}</td>
                                @switch($payment->order->status)
                                    @case('pending')
                                        <td class="text-warning">{{ $payment->order->status }}</td>
                                    @break

                                    @case('shipping')
                                        <td class="text-info">{{ $payment->order->status }}</td>
                                    @break

                                    @case('success')
                                        <td class="text-success">{{ $payment->order->status }}</td>
                                    @break

                                    @default
                                        @case('pending')
                                            <td>undefined</td>
                                        @break
                                    @endswitch
                                    <td>{{ $payment->type == 0 ? 'At store' : 'shipping' }}</td>
                                    <td>{{ $payment->customer->full_name }}</td>
                                    <td>{{ $payment->customer->address }}</td>
                                    <td>{{ $payment->total_price }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

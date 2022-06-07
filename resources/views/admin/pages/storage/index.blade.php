@extends('admin.master')
@section('title')
    Product Table Management
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Bill Code</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Storage</th>
                    <th>Import Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($imports as $key => $import)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $import->bill_id }}</td>
                        <td>{{ $import->product->name }}</td>
                        <td>{{ $import->quantity }}</td>
                        <td>{{ $import->storage->name }}</td>
                        <td>{{ $import->import_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('admin.master')
@section('title')
    Promotion Code Management
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th class="text-info">#</th>
                            <th class="text-info">Promotion Code</th>
                            <th class="text-info">Value</th>
                            <th class="text-info">Unit</th>
                            <th class="text-info">Quantity</th>
                            <th class="text-info">Start Date</th>
                            <th class="text-info">End Date</th>
                            <th class="text-info" style="width:400px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promotions as $key => $promotion)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $promotion->code }}</td>
                                <td>{{ $promotion->value }}</td>
                                <td>{{ $promotion->unit }}</td>
                                <td>{{ $promotion->quantity }}</td>
                                <td>{{ $promotion->start_date }}</td>
                                <td>{{ $promotion->end_date }}</td>
                                <td>
                                    <a href="{{ route('promotion.show', $promotion->id) }}"
                                        class="btn btn-outline-primary waves-effect">Detail</a>
                                    <button data-id="{{ $promotion->id }}"
                                        class="btn btn-outline-danger waves-effect delete" data-toggle="modal"
                                        data-target="#delete-promotion">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

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
                                    <a href="{{ route('promotion.edit', $promotion->id) }}"
                                        class="btn btn-info waves-effect">Edit</a>
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
@section('modals')
    <div class="modal fade modal-danger text-left" id="delete-promotion" tabindex="-1" aria-labelledby="myModalLabel120"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel120">Delete this promotion ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this promotion ?
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="promotion-id-delete" name="role">
                    <button type="submit" class="btn btn-danger waves-effect waves-float waves-light" data-dismiss="modal"
                        id="confirm">Accept</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                $('#promotion-id-delete').val($(this).data('id'));
            });
            $('#confirm').click(function() {
                let route = "{{ route('promotion.delete', '') }}" + '/' + $('#promotion-id-delete').val();
                $.ajax({
                    url: route,
                    type: 'DELETE',
                    success: function(res) {
                        if (res.status) {
                            location.reload();
                        }
                    },
                    error: function(data) {
                        toastr.error(
                            "Cannot delete this promotion because some payment has already use this promotion"
                        );
                    }
                })
            })
        })
    </script>
@endsection

@extends('admin.master')
@section('title')
    Administrators Table
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th class="text-info">#</th>
                            <th class="text-info">Full Name</th>
                            <th class="text-info">Identity Number</th>
                            <th class="text-info">Email</th>
                            <th class="text-info">Phone Number</th>
                            <th class="text-info">Address</th>
                            <th class="text-info">Master</th>
                            <th class="text-info">Role</th>
                            <th class="text-info" style="width:400px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $key => $admin)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $admin->full_name }}</td>
                                <td>{{ $admin->identity_number }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone_number }}</td>
                                <td>{{ $admin->address }}</td>
                                <td class="text-success">
                                    @if ($admin->is_master == true)
                                        <i data-feather='check'></i>
                                    @else
                                        <i data-feather='x'></i>
                                    @endif
                                </td>
                                <td>{{ $admin->role->name }}</td>
                                <td>
                                    <a href="{{ route('admin.show', $admin->id) }}"
                                        class="btn btn-outline-primary waves-effect">Detail</a>
                                    <button data-id="{{ $admin->id }}" class="btn btn-outline-danger waves-effect delete"
                                        data-toggle="modal" data-target="#delete-admin">Delete</button>
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
    <div class="modal fade modal-danger text-left" id="delete-admin" tabindex="-1" aria-labelledby="myModalLabel120"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel120">Delete this admin ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this admin ?
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="admin-id-delete" name="role">
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
                $('#admin-id-delete').val($(this).data('id'));
            });
            $('#confirm').click(function() {
                let route = "{{ route('admin.delete', '') }}" + '/' + $('#admin-id-delete').val();
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
                            "Cannot delete you"
                        );
                    }
                })
            })
        })
    </script>
@endsection

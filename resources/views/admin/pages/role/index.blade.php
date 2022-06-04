@extends('admin.master')
@section('title')
    Role Table
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ route('role.show', $role->id) }}"
                                class="btn btn-outline-primary waves-effect">Detail</a>
                            <a href="{{ route('role.edit', $role->id) }}"
                                class="btn btn-outline-info waves-effect">Edit</a>
                            <button data-id="{{ $role->id }}" class="btn btn-outline-danger waves-effect delete"
                                data-toggle="modal" data-target="#delete-role">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('modals')
    <div class="modal fade modal-danger text-left" id="delete-role" tabindex="-1" aria-labelledby="myModalLabel120"
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
                    Are you sure to delete this role ?
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="role-id-delete" name="role">
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
                $('#role-id-delete').val($(this).data('id'));
            });
            $('#confirm').click(function() {
                let route = "{{ route('role.delete', '') }}" + '/' + $('#role-id-delete').val();
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
                            "Cannot delete this role because admin still owns the role"
                        );
                    }
                })
            })
        })
    </script>
@endsection

@extends('admin.master')
@section('title')
    Category Table
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Is Parent</th>
                            <th>Parent Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->is_parent == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $category->parent_name }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}"
                                        class="btn btn-outline-info waves-effect">Edit</a>
                                    <button data-id="{{ $category->id }}"
                                        class="btn btn-outline-danger waves-effect delete" data-toggle="modal"
                                        data-target="#delete-category">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
@section('modals')
    <div class="modal fade modal-danger text-left" id="delete-category" tabindex="-1" aria-labelledby="myModalLabel120"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel120">Delete this category ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this category ?
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="category-id-delete" name="category">
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
                $('#category-id-delete').val($(this).data('id'));
            });
            $('#confirm').click(function() {
                let route = "{{ route('category.delete', '') }}" + '/' + $('#category-id-delete').val();
                $.ajax({
                    url: route,
                    type: 'DELETE',
                    success: function(res) {
                        if (res.status) {
                            location.reload();
                        }
                    },
                    error: function(res) {
                        toastr.error(res.responseJSON.msg);
                    }
                })
            })
        })
    </script>
@endsection

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
                    <th>Name</th>
                    <th>Short Description</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->short_description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td class="text-center">
                            <img src="{{ $product->image->path }}" alt="" width="200px" style="height: 100px">
                        </td>
                        <td class="text-center">
                            <a href="{{ route('product.show', $product->id) }}"
                                class="btn btn-outline-primary waves-effect">Detail</a>
                            <button data-id="{{ $product->id }}" class="btn btn-outline-danger waves-effect delete"
                                data-toggle="modal" data-target="#delete-product">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('modals')
    <div class="modal fade modal-danger text-left" id="delete-product" tabindex="-1" aria-labelledby="myModalLabel120"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel120">Delete this product ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this product ?
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="product-id-delete" name="product">
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
                $('#product-id-delete').val($(this).data('id'));
            });
            $('#confirm').click(function() {
                let route = "{{ route('product.delete', '') }}" + '/' + $('#product-id-delete').val();
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
                            "This product is still in stock"
                        );
                    }
                })
            })
        })
    </script>
@endsection

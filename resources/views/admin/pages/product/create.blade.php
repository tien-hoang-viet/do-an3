@extends('admin.master')
@section('title')
    Create Product
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Form</h4>
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('product.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="first-name-vertical">Name</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="name"
                                        placeholder="Product Name">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <div class="input-group input-group-merge mb-2">
                                        <input type="text" class="form-control" placeholder="1000000" name="price"
                                            id="price">
                                        <div class="input-group-append">
                                            <span class="input-group-text">VND</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="custom-select" id="customSelect" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="short">Short Description</label>
                                    <input type="text" class="form-control" name="short_description"
                                        placeholder="Short description of product" id="short">
                                </div>
                            </div>
                            <div class="col-12 mt-1">
                                <div class="form-group">
                                    <label for="path"> Product image</label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input id="image" class="form-control" name="path" readonly="true">
                                        </div>
                                        <div class="col-md-2">
                                            <a data-input="image" data-preview="image-preview" id="img-upload"
                                                class="lfm btn btn-primary">
                                                Upload
                                            </a>
                                        </div>
                                        <div class="col-md-12 text-center" id="img-frame">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <div class="form-group">
                                    <textarea name="description" class="form-control" id="des" rows="3" cols="40" placeholder="Description">

                                    </textarea>
                                </div>
                            </div>
                            {{-- Button --}}
                            <div class="col-12 mt-2">
                                <button type="submit"
                                    class="btn btn-primary mr-1 waves-effect waves-float waves-light">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
@section('js')
    <script src="/admin_assets/ckeditor/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        CKEDITOR.replace('des');
    </script>
    <script>
        $('.lfm').filemanager('path');
    </script>
    <script>
        $(document).ready(function() {

            function convertCurrency(x) {
                x = x.toLocaleString('it-IT', {
                    style: 'currency',
                    currency: 'VND'
                });
                x = x.slice(0, x.indexOf('VND'));
                return x;
            }
            $('#price').blur(function() {
                let price = parseInt($(this).val());
                if (!isNaN(price)) {
                    price = convertCurrency(price);
                    $('#price').val(price);
                }
            });
            $('#image').change(function() {
                let html =
                    ` <img id="image-preview" class="img-thumbnail mt-1" src="" style="height: 300px">`;
                $('#img-frame').html(html);
            })
        })
    </script>
@endsection

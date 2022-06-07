@extends('admin.master')
@section('title')
    Product : {{ $product->name }}
@endsection
@section('content')
    <form action="{{ route('product.update', $product->id) }}" method="POST" class="form form-vertical">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Name</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="name"
                                        placeholder="Product Name" value="{{ $product->name }}">
                                </div>
                            </div>
                            <div class="col-6">
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="custom-select" id="customSelect" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $categoryOfProduct->id ? 'selected' : '' }}>
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
                                        placeholder="Short description of product" id="short"
                                        value="{{ $product->short_description }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="">Description</label>
                                <div class="form-group">
                                    <textarea name="description" class="form-control" id="des" rows="3" cols="40" placeholder="Description">

                                </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 form-group">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 mt-1">
                            <div class="form-group">
                                <label for="path"> Product image</label>
                                <div class="row">
                                    <div class="col-md-10">
                                        <input id="image" class="form-control image-input"
                                            value="{{ $imageOfProduct->path }}" readonly="true" name="path">
                                    </div>
                                    <div class="col-md-2">
                                        <a data-input="image" data-preview="image-preview-frame" id="img-upload"
                                            class="lfm btn btn-primary">
                                            Upload
                                        </a>
                                    </div>
                                    <div class="col-md-12 text-center" id="img-frame">
                                        <img src="{{ $imageOfProduct->path }}" id="image-preview-frame" alt="img"
                                            class="img-thumbnail mt-1" style="height: 300px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Button --}}
                        <div class="col-12 mt-2">
                            <button type="submit"
                                class="btn btn-primary mr-1 waves-effect waves-float waves-light">Change</button>
                            <a href="{{ route('product.index') }}" class="btn btn-outline-danger waves-effect">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('page-js')
    <script src="/admin_assets/ckeditor/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        var description = " {!! $product->description !!}";
        CKEDITOR.replace('des');
        CKEDITOR.instances['des'].setData(description);
    </script>
    <script>
        $('.lfm').filemanager('path');
    </script>
@endsection
@section('js')
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

            function unConvertCurrency(x) {
                x = x.replace(/^\s+/g, '');
                return x.replaceAll('.', '');
            }

            var price = {!! $product->price !!};
            $('#price').val(convertCurrency(price));

            $('#price').change(function() {
                let priceChange = parseInt(unConvertCurrency($(this).val()));
                $('#price').val(convertCurrency(priceChange));
            })
        })
    </script>
@endsection

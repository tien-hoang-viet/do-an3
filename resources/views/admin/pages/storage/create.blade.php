@extends('admin.master')
@section('title')
    Import Goods
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="input-group mb-2">
                        <select id="storage" class="form-control custom-select">
                            @foreach ($storages as $storage)
                                <option value="{{ $storage->id }}">{{ $storage->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i data-feather="search"></i></span>
                        </div>
                        <input type="text" id="search" class="form-control" placeholder="Nhập vào sản phẩm..." />
                    </div>
                    <div class="table-responsive">
                        <table id="listSanPham" class="table table-hover">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="listKho">
                            <tbody>

                            </tbody>
                        </table>
                        <div class="text-right mt-2">
                            <button id="import" class="btn btn-primary">Import!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(e) {
            var listNhapKho = [];

            function checkButton() {
                var count = listNhapKho.length;
                if (count > 0) {
                    $("#import").show();
                } else {
                    $("#import").hide();
                }
            }

            function loadProducts() {
                var html = '';
                $.ajax({
                    url: "{{ route('storage.products') }}",
                    type: 'get',
                    success: function(res) {
                        var data = res.data;
                        $.each(data, function(key, value) {
                            html += '<tr><td>';
                            html += value.name;
                            html += '</td>';
                            html +=
                                '<td class="text-right"><button class="btn btn-primary add" data-id="' +
                                value.id + '" data-name="' + value.name +
                                '">Add</button></td>';
                            html += '</td></tr>';
                        });
                        $('#listSanPham tbody').html(html);
                    }
                });
            }
            loadProducts();
            checkButton();

            function loadKho(data) {
                var html = '';
                $.each(data, function(key, value) {
                    html += '<tr>';
                    html += '<th scope="col">' + (key + 1) + '</th>';
                    html += '<td class="text-nowrap">' + value.name + '</td>';
                    html += '<td>';
                    html += '<input type="text" min = "1"  requied id="quantity_' + key +
                        '" class="form-control numeral-mask" placeholder="Quantity">';
                    html += '<input type="hidden" id="id_' + key + '" value="' + value.id + '"';
                    html += '</td>';
                    html += '<td>';
                    html += '<input type="text" min = "1000" requied id="import_price_' + key +
                        '" class="form-control numeral-mask" placeholder="Import Price">';
                    html += '</td>';
                    html += '<td class="text-right">';
                    html += '<button class="btn btn-danger delete" data-id= "' + value.id + '">X</button>';
                    html += '</td>';
                    html += '</tr>';
                });
                $('#listKho tbody').html(html);
            }
            $('body').on('click', '.add', function() {
                var id = $(this).data('id');
                var ten = $(this).data('name');
                var san_pham = {
                    'id': id,
                    'name': ten,
                };
                var res = listNhapKho.findIndex(x => x.id === id);
                if (res < 0) {
                    listNhapKho.push(san_pham);
                    loadKho(listNhapKho);
                    checkButton();
                } else {
                    toastr.warning('This product is already exist in import bill');
                }
            });
            $('body').on('click', '.delete', function() {
                var id = $(this).data('id');
                for (var i = 0; i < listNhapKho.length; i++) {
                    if (listNhapKho[i].id == id) {
                        listNhapKho.splice(i, 1);
                        break;
                    }
                }
                loadKho(listNhapKho);
                checkButton();
            });
            $('#import').click(function(e) {
                var data = [];
                $.each(listNhapKho, function(k, v) {
                    var id = "#id_" + k;
                    var quantity = "#quantity_" + k;
                    var importPrice = "#import_price_" + k;
                    var importProduct = {
                        'id': $(id).val(),
                        'quantity': $(quantity).val(),
                        'import_price': $(importPrice).val(),
                    };
                    data.push(importProduct);
                });
                var payload = {
                    'storage': $('#storage').val(),
                    'send_data': data,
                }
                $.ajax({
                    url: "{{ route('storage.store') }}",
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        if (res.status) {
                            toastr.success('Đã Nhập Hàng Thành Công')
                            window.location.href = "{{ route('storage.index') }}";
                        } else {
                            toastr.error('Có Lỗi Bất Ngờ');
                        }
                    },
                });
            });

            $("#search").keyup(function(e) {
                var name = $("#search").val();
                if (name.length == 0) {
                    loadProducts();
                } else {
                    var payload = {
                        'name': name,
                    }
                    $.ajax({
                        url: " {{ route('storage.search') }}",
                        type: 'post',
                        data: payload,
                        success: function(res) {
                            var html = '';
                            var data = res.data;
                            console.log(data);
                            $.each(data, function(key, value) {
                                html += '<tr>';
                                html += '<td>' + value.name + '</td>';
                                html += '<td class="text-right">';
                                html +=
                                    '<button class="btn btn-primary add" data-id="' +
                                    value.id + '" data-name="' + value.name +
                                    '">Add</button></td></tr>';
                            });
                            $("#listSanPham tbody").html(html);
                        },
                    });
                }
            });
        });
    </script>
@endsection

{{-- @section('js') --}}
{{-- <script>
        $(document).ready(function() {
            var toatalProducts = {!! json_encode($products->toArray()) !!}.length;
            var count = 1;
            'use strict';
            // form repeater jquery
            $('.invoice-repeater, .repeater-default').repeater({
                show: function() {
                    if (count == toatalProducts) {
                        toastr.warning('Only have ' + toatalProducts + ' products in database')
                        return;
                    }
                    count++;
                    $(this).slideDown();
                    // Feather Icons
                    if (feather) {
                        feather.replace({
                            width: 14,
                            height: 14
                        });
                    }
                },
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        count--;
                        console.log(count);
                        $(this).slideUp(deleteElement);
                    }
                }
            });

            function getForm(form) {
                var unindexed_array = form.serializeArray();
                var indexed_array = {};
                //console.log(unindexed_array);
                $.map(unindexed_array, function(n, i) {
                    indexed_array[n["name"]] = n["value"];
                });

                return indexed_array;
            }
            $('#submit').click(function() {
                var form = getForm($('#myForm'));
            })
        })
    </script> --}}
{{-- @endsection --}}
@section('page-js')
    <script src="/admin_assets/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="/admin_assets/app-assets/js/scripts/forms/form-input-mask.js"></script>
@endsection

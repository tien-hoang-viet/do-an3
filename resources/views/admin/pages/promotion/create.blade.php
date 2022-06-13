@extends('admin.master')
@section('title')
    Create Promotion Code
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h class="card-title">Create Promotion Form</h4>
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('promotion.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" id="code" class="form-control" name="code" placeholder="Code"
                                        required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="value">Value</label>
                                    <input type="number" id="value" class="form-control" name="value"
                                        placeholder="5 10 15 20" max="100" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <select class="form-control" id="unit" name="unit">
                                        <option value="%">Percent - %</option>
                                        <option value="VND">VND</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone-vertical">Quantity</label>
                                    <input type="number" id="phone-vertical" class="form-control" name="quantity"
                                        placeholder="quantity" required>
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="start">Start Date</label>
                                <input type="text" name="start_date" class="form-control flatpickr-range flatpickr-input"
                                    id="start" placeholder="DD-MM-YYYY" readonly="readonly" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="end">End Date</label>
                                <input type="text" class="form-control flatpickr-range flatpickr-input end" id="end"
                                    placeholder="DD-MM-YYYY" readonly disabled>
                                <input type="hidden" name="end_date" class="end">
                            </div>
                        </div>
                        <div class="col-12 form-group p-1 text-center">
                            <button type="submit"
                                class="btn btn-primary mr-1 waves-effect waves-float waves-light">Create</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
@section('js')
    <script src="/custom/js/date-time-format.js"></script>
    <script>
        $(document).ready(function() {
            $('#start').change(function() {
                let start = $('#start').val();
                let end = '';
                if (start.includes("to")) {
                    end = start.substr(start.indexOf("to") + 3, start.length).trim();
                    start = start.substr(0, start.indexOf("to")).trim();
                    $('#start').val(start);
                    $('.end').val(end);
                }
            })
            $('#code').blur(function() {
                let code = $('#code').val();
                $('#code').val(code.toUpperCase());
            })
            $('#value').blur(function() {
                if ($('#unit').val() == '%') {
                    $('#value').attr('max', '100');
                    $('#value').attr('min', '0');
                } else {
                    $('#value').removeAttr('max');
                    $('#value').removeAttr('min');
                }
            })
        })
    </script>
@endsection
@section('page-css')
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/plugins/forms/pickers/form-pickadate.css">
@endsection
@section('page-js')
    <script src="/admin_assets/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="/admin_assets/app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
@endsection

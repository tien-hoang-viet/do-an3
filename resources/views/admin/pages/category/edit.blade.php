@extends('admin.master')
@section('title')
    Edit {{ $category->name }}
@endsection
@section('content')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Form</h4>
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="first-name-vertical">Name</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="name"
                                        placeholder="Category Name" value="{{ $category->name }}">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-success">
                                        <p class="mb-50">Is Parent: </p>
                                        <input type="checkbox" class="custom-control-input" id="is_parent_switch"
                                            name="is_parent" {{ $category->is_parent == 1 ? 'checked' : ' ' }}>
                                        <label class="custom-control-label" for="is_parent_switch">
                                            <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-check">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg></span>
                                            <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-x">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" id="parent_id">
                                    @if ($category->parent_id !== 0)
                                        <select class="custom-select" name="parent_id" id="">
                                            @foreach ($parentCategories as $parentCategory)
                                                <option value="{{ $parentCategory->id }}"
                                                    {{ $parentCategory->id == $category->parent_id ? ' selected' : '' }}>
                                                    {{ $parentCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                            {{-- Button --}}
                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">
                                    Submit
                                </button>
                                <a href={{ route('category.index') }} class="btn btn-outline-danger waves-effect">
                                    Go Back
                                </a>
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
    <script>
        $(document).ready(function() {
            var parents = {!! json_encode($parentCategories->toArray()) !!};
            console.log(parents);
            $('#is_parent_switch').change(function() {
                if ($(this).prop("checked") == true) {
                    $('#parent_id').html('');
                } else if ($(this).prop("checked") == false) {
                    if (parents.length !== 0) {
                        var html =
                            '<label for="parent-vertical">Parent ID:</label><select class="custom-select" id="parent" name="parent_id">';
                        $.each(parents, function(k, v) {
                            html += `<option value="` + v.id +
                                `">` + v.name +
                                `</option>`;
                        })
                        $('#parent_id').html(html);
                    } else {
                        toastr.warning('There is no root category left in database');
                        $(this).prop("checked", true);
                    }
                }
            })
        })
    </script>
@endsection

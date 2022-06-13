@extends('admin.master');
@section('title')
    Role : {{ $role->name }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Role Form</h4>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{ route('role.update', $role->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        <label for="role-name">Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" id="role-name" class="form-control" name="name"
                                            placeholder="Role Name" value="{{ $role->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        <h5>Permission</h5>
                                    </div>
                                    <div class="row ml-2">
                                        @foreach ($permissions as $key => $permission)
                                            <div class="col-md-3 mt-3">
                                                <div class="custom-control custom-control-success custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="{{ $permission->slug }}" name="permissions[]"
                                                        value="{{ $permission->id }}"
                                                        {{ in_array($permission->id, $permissionOfRoles) ? 'checked="checked"' : ' ' }} />
                                                    <label class="custom-control-label"
                                                        for="{{ $permission->slug }}">{{ $permission->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 offset-sm-4 mt-4">
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

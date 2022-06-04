@extends('admin.master')
@section('title')
    Admin : {{ $admin->full_name }}
@endsection
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.update', $admin->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="full-name">Full Name</label>
                                <input type="text" class="form-control" value="{{ $admin->full_name }}" id="full-name"
                                    name="full_name">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Email" value="{{ $admin->email }}"
                                    name="email" id="email">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" placeholder="Address"
                                    value="{{ $admin->address }}" name="address" id="address">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="identiti-number">Identiti Number</label>
                                <input type="text" class="form-control" name="identity_number"
                                    value="{{ $admin->identity_number }}" placeholder="988724214342" id="identiti-number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Phone Number</label>
                                <input type="number" id="phone-vertical" class="form-control" name="phone_number"
                                    value="{{ $admin->phone_number }}" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-success">
                                    <p class="mb-50">Is Master: </p>
                                    <input type="checkbox" class="custom-control-input" id="is_master_switch"
                                        name="is_master" {{ $admin->is_master ? 'checked' : ' ' }}>
                                    <label class="custom-control-label" for="is_master_switch">
                                        <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-check">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg></span>
                                        <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name='role_id'>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $roleOfAdmin->id == $role->id ? ' selected="selected"' : ' ' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                            <button type="submit"
                                class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-float waves-light">Save
                                Changes</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

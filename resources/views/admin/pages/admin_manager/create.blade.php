@extends('admin.master')
@section('title')
    Create Admin
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Admin Form</h4>
                </div>
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('admin.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Full Name</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="full_name"
                                        placeholder="Full Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-id-vertical">Email</label>
                                    <input type="email" id="email-id-vertical" class="form-control" name="email"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="address-id-vertical">Address</label>
                                    <input type="text" id="address-id-vertical" class="form-control" name="address"
                                        placeholder="Address">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone-vertical">Phone Number</label>
                                    <input type="number" id="phone-vertical" class="form-control" name="phone_number"
                                        placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="identity-vertical">Identity Number</label>
                                    <input type="number" id="identity-vertical" class="form-control"
                                        name="identity_number" placeholder="Identity Number">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password-vertical">Password</label>
                                    <input type="password" id="password-vertical" class="form-control" name="password"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-success">
                                        <p class="mb-50">Is Master: </p>
                                        <input type="checkbox" class="custom-control-input" id="is_master_switch"
                                            name="is_master">
                                        <label class="custom-control-label" for="is_master_switch">
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
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="role-vertical">Role</label>
                                    <select class="custom-select" id="role" name="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit"
                                    class="btn btn-primary mr-1 waves-effect waves-float waves-light">Create</button>
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

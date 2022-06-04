@extends('admin.master')
@section('title')
    Detail role of {{ $role->name }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-lg-6 text-center">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Role Detail</h4>
                    <div class="divider divider-success">
                        <div class="divider-text">Role Infomation</div>
                    </div>
                    <p class="card-text">
                        Id : {{ $role->id }}
                        <br>
                        Name : {{ $role->name }}
                    </p>
                    <div class="divider divider-success">
                        <div class="divider-text">Permission of role</div>
                    </div>
                    <div class="collapse-default text-center">
                        @foreach ($permissions as $key => $permission)
                            <div class="card ">
                                <div id="{{ $permission->id }}" class="card-header collapsed" data-toggle="collapse"
                                    role="button" data-target="#{{ $permission->slug }}" aria-expanded="false"
                                    aria-controls="{{ $permission->slug }}">
                                    <span class="lead collapse-title">{{ $permission->name }} </span>
                                </div>
                                <div id="{{ $permission->slug }}" role="tabpanel"
                                    aria-labelledby="{{ $permission->id }}" class="collapse">
                                    <div class="card-body text-center">
                                        Name: {{ $permission->name }}
                                        <br>
                                        Slug: {{ $permission->slug }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('role.index') }}" class="btn btn-outline-primary waves-effect">Go back</a>
                </div>
            </div>
        </div>
        <div class="col-md-3"> </div>
    </div>
@endsection

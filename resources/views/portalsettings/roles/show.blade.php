@extends('layouts.portalsettings')
@section('contenta')
    <!-- Page Content -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{$role->name}} role</h3>
                <div class="block-options">
                    <a href="{{route('roles.index')}}" class="btn-block-option">&#8592; back to roles</a>
                </div>
            </div>
            <div class="block-content">
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating open">
                            <input id="name" type="text" readonly class="form-control-plaintext" value="{{ $role->name }}">
                            <label for="name">{{ __('Name') }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating open">
                            <div class="table-responsive push">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 60px;"></th>
                                            <th>Permission</th>
                                            <th>Submenu</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <input type="hidden" value="{{ $i=0 }}" />
                                        @forelse ($role->permissions as $permission)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>
                                                    @if ($getpermission->GetPermissionById($permission->id))
                                                    {{ $getpermission->GetPermissionById($permission->id)->submenu? $getpermission->GetPermissionById($permission->id)->submenu->name:'no submenu'  }}

                                                    @else
                                                        no submenu
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4">No permission added</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <label for="">{{ __('Permissions') }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating open">
                            <div class="table-responsive push">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 60px;"></th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <input type="hidden" value="{{ $i=0 }}" />
                                        @forelse ($role->users as $user)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username? $user->username:'no username'  }}</td>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4">No user has this role</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <label for="">{{ __('Users') }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating open">
                            <textarea id="description" readonly class="form-control-plaintext">{{ $role->description }}</textarea>
                            <label for="description">{{ __('Description') }}</label>
                        </div>
                    </div>
                </div>
                <a href="{{route('roles.index')}}" class="nav-link">&#8592; back to roles</a>
            </div>
         </div>
    @endsection

@extends('layouts.portalsettings')
@section('contenta')
    <!-- Page Content -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{$permission->name}} permission</h3>
                <div class="block-options">
                    <a href="{{route('permissions.index')}}" class="btn-block-option">&#8592; back to permissions</a>
                </div>
            </div>
            <div class="block-content">
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-material floating open">
                            <input id="name" type="text" readonly class="form-control-plaintext" value="{{ $permission->name }}">
                            <label for="name">{{ __('Name') }}</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-material floating open">
                            <input id="submenu" type="text" readonly class="form-control-plaintext" value="{{ $permission->submenu? $permission->submenu->name:'no submenu' }}">
                            <label for="submenu">{{ __('Submenu') }}</label>
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
                                        @if($permission)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->submenu? $permission->submenu->name:'no submenu'  }}</td>
                                                <td>{{ $permission->description }}</td>
                                            </tr>
                                        @else
                                        <tr>
                                            <td colspan="4">No permission added</td>
                                        </tr>
                                        @endif
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
                            <textarea id="description" readonly class="form-control-plaintext">{{ $permission->description }}</textarea>
                            <label for="description">{{ __('Description') }}</label>
                        </div>
                    </div>
                </div>
                <a href="{{route('permissions.index')}}" class="nav-link">&#8592; back to permissions</a>
            </div>
         </div>
    @endsection

@extends('layouts.portalsettings')
@section('css_aftera')
    <style>
        .invalid-feedback{
            display: block;
        }

        .is-invalid {
            box-shadow: 0 1px 0 #ef5350 !important;
        }
    </style>
@endsection
@section('contenta')
    <!-- Material (floating) Register -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Role</h3>
            <div class="block-options">
                <a href="{{route('roles.index')}}" class="btn-block-option">&#8592; back to roles</a>
            </div>
        </div>
        <div class="block-content">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('roles.update', $role) }}" method="post" class="@if ($errors->any()) was-valdated @endif">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating">
                        <input type="text" name="name" id="name" value="{{$role->name}}" class="form-control @error('name') is-invalid @enderror">
                            <label for="name">{{ _('Name') }}</label>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12 push">
                        @foreach($permission as $value)
                            <label class="css-control css-control-primary css-checkbox">
                                <input type="checkbox" class="name css-control-input" name="permission[]" id="permission" value="{{$value->id}}" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }} >
                                <span class="css-control-indicator"></span> {{ $value->name }}
                            </label>
                        @endforeach
                        @error('permission')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating">
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ $role->description }}</textarea>
                            <label for="description">Description</label>
                        </div>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </form>
            <a href="{{route('roles.index')}}" class="nav-link">&#8592; back to roles</a>
        </div>
    </div>
@endsection

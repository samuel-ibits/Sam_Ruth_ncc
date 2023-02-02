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
            <h3 class="block-title">Create Role</h3>
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
            <form action="{{route('roles.store')}}" method="POST" class="@if ($errors->any()) was-valdated @endif">
                @csrf
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off" autofocus>
                            <label for="name">{{ __('Name') }}</label>
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
                                {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name css-control-input', 'id' => 'permission'.$value->id)) }}
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
                                <textarea name="description" class="form-control @error('permission') is-invalid @enderror">{{ old('description') }}</textarea>
                                <label for="description">{{ __('Description') }}</label>
                        </div>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </form>
            <a href="{{route('roles.index')}}" class="nav-link">&#8592; back to roles</a>
        </div>
    </div>
@endsection

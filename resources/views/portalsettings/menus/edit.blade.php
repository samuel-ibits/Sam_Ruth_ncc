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
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Menu</h3>
            <div class="block-options">
                <a href="{{route('menus.index')}}" class="btn-block-option">&#8592; back to menus</a>
            </div>
        </div>
        <div class="block-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('menus.update', $menu)}}" method='post' class='@if ($errors->any()) was-valdated @endif'>
                @csrf
                @method('PUT')
                <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-material floating">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $menu->name }}" autocomplete="off" autofocus>
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
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-material floating">
                        <input id="folder" type="text" class="form-control @error('folder') is-invalid @enderror" name="folder" value="{{ $menu->folder }}" autocomplete="off">
                        <label for="folder">{{ __('Folder') }}</label>
                    </div>
                    @error('folder')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-material floating">
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ $menu->description }}</textarea>
                        <label for="description">{{ __('Description') }}</label>
                    </div>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </div>
            </div>
            {!! Form::close() !!}
            <a href="{{route('menus.index')}}" class="nav-link">&#8592; back to menus</a>
        </div>
    </div>
@endsection

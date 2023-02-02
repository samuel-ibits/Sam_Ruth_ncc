@extends('layouts.portalsettings')
@section('contenta')
    <!-- Page Content -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{$submenu->name}} submenu</h3>
                <div class="block-options">
                    <a href="{{route('submenus.index')}}" class="btn-block-option">&#8592; back to submenus</a>
                </div>
            </div>
            <div class="block-content">
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-material floating open">
                            <input id="menu" type="text" readonly class="form-control-plaintext" value="{{ $submenu->menu->name }}">
                            <label for="menu">{{ __('Menu') }}</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-material floating open">
                            <input id="name" type="text" readonly class="form-control-plaintext" value="{{ $submenu->name }}">
                            <label for="name">{{ __('Name') }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating open">
                            <input id="url" type="text" readonly class="form-control-plaintext" value="{{ $submenu->menu->folder."/".$submenu->url }}">
                            <label for="url">{{ __('URL') }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-material floating open">
                            <input id="permission" type="text" readonly class="form-control-plaintext" value="{{ $submenu->permission?$submenu->permission->name:'No permission added'  }}">
                            <label for="permission">{{ __('Permission') }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="form-material floating open">
                            <textarea id="description" readonly class="form-control-plaintext">{{ $submenu->description }}</textarea>
                            <label for="description">{{ __('Description') }}</label>
                        </div>
                    </div>
                </div>
                <a href="{{route('submenus.index')}}" class="nav-link">&#8592; back to submenus</a>
            </div>
         </div>
    @endsection

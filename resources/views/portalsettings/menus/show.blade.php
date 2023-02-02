@extends('layouts.portalsettings')
@section('contenta')
    <!-- Page Content -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{$menu->name}} menu</h3>
                <div class="block-options">
                    <a href="{{route('menus.index')}}" class="btn-block-option">&#8592; back to menus</a>
                </div>
            </div>
            <div class="block-content">
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating open">
                            <input id="name" type="text" readonly class="form-control-plaintext" value="{{ $menu->name }}">
                            <label for="name">{{ __('Name') }}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating open">
                            <input id="folder" type="text" readonly class="form-control-plaintext" value="{{ $menu->folder }}">
                            <label for="folder">{{ __('Folder') }}</label>
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
                                            <th>Permission</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <input type="hidden" value="{{ $i=0 }}" />
                                        @forelse ($menu->submenus as $submenu)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $submenu->name }}</td>
                                                <td>{{ $submenu->permission? $submenu->permission->name:'no permission'  }}</td>
                                                <td>{{ $submenu->description }}</td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4">No submenu added</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <label>Submenus</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating open">
                            <textarea id="description" readonly class="form-control-plaintext">{{ $menu->description }}</textarea>
                            <label for="description">{{ __('Description') }}</label>
                        </div>
                    </div>
                </div>
                <a href="{{route('menus.index')}}" class="nav-link">&#8592; back to menus</a>
            </div>
         </div>
    @endsection

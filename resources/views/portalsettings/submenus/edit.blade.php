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
            <h3 class="block-title">Create Submenu</h3>
            <div class="block-options">
                <a href="{{route('submenus.index')}}" class="btn-block-option">&#8592; back to Submenus</a>
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
            <form action="{{ route('submenus.update', $submenu->id) }}" class=" @if ($errors->any()) was-valdated @endif" method="POST" id="edit">
                @csrf
                @method('PUT')
            <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-material floating">
                        <select name="menu" id="menu" class="form-control">
                            <option value="" selected = "true">Select menu</option>
                            @foreach ($menus as $menu)
                            <option value="{{$menu->id}}/{{$menu->folder}}" {{($menu->id === $submenu->menu->id? 'selected': "")}}>{{$menu->name}}</option>
                            @endforeach
                        </select>
                        <label for="menu">Menu</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-material floating">
                        {!! Form::text('name', $submenu->name, array('class' => 'form-control', 'id'=>'name')) !!}
                        <label for="name">Name</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <span class="mt-auto pb-2 ml-4 folder border-bottom">{{$submenu->menu->folder}} /</span>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-material floating">
                        {!! Form::text('url', $submenu->url, array('class' => 'form-control', 'id'=>'url')) !!}
                        <label for="url">URL</label>
                    </div>
                </div>
            </div>
            @if (count($permissions) > 0)
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating open" id="permissionDiv">
                            <select name="permission" id="permission" class="form-control">
                                <option value="" selected = "true">Select permission</option>
                                @foreach($permissions as $value)
                                    <option value="{{ $value['id'] }}" {{ ( $submenu->permission? $value['id'] === $submenu->permission->id ? 'selected': "":"")}}>{{$value['name']}}</option>
                                @endforeach
                            </select>
                            <label for="permission">{{ __('Permission') }}</label>
                        </div>
                        @error('permission')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="css-control css-control-primary css-checkbox">
                            <input type="checkbox" id="addPermission" class="css-control-input" checked >
                            <span class="css-control-indicator"></span> {{ __('Add a permission')}}
                        </label>
                    </div>
                </div>
            @endif

            <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-material">
                        <label class="css-control css-control-primary css-checkbox">
                            <input type="checkbox" id="is_visible" name="is_visible" class="css-control-input" value = true {{ $submenu->is_visible == 1 ? 'checked' : '' }} >
                            <span class="css-control-indicator"></span> {{ __('Make Vissible') }}
                        </label>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-material">
                        <label class="css-control css-control-primary css-checkbox">
                            <input type="checkbox" id="is_entry" name = "is_entry" class="css-control-input" value = true {{ $submenu->is_entry == 1 ? 'checked' : '' }}  >
                            <span class="css-control-indicator"></span> {{ __('Make Entry') }}
                        </label>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-material floating">
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{$submenu->description}}</textarea>
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
                    <button type="submit" class="btn btn-primary">{{ __('Create')}}</button>
                </div>
            </div>
            </form>
        <a href="{{route('submenus.index')}}" class="nav-link">&#8592; back to Submenus</a>
        </div>
    </div>
@endsection
@section('js_aftera')
<script>
    const menu = document.querySelector("#menu");
    const url = document.querySelector("#url");
    const form = document.querySelector("#edit");
    let folder = document.querySelector('.folder');

    const addfolder = (value)=>{
        if(value !== ""){
            const foldername = value.split("/")[1];
            if(folder === null){
                folder = document.createElement("span");
                folder.classList.add('mt-auto','pb-2','ml-4', 'folder', 'border-bottom');
            }
            folder.textContent = `${foldername }  /`;
            // column = document.createElement("div");
            // column.classList.add('col-xs-4', 'col-sm-4', 'col-md-4');
            // column.appendChild(folder);
            url.parentElement.parentElement.classList.remove('col-xs-12', 'col-sm-12', 'col-md-12')
            url.parentElement.parentElement.classList.add('col-xs-8', 'col-sm-8', 'col-md-8')
            url.parentElement.parentElement.parentElement.insertBefore(folder, url.parentElement.parentElement);
        }else{
            if(folder !== null){
                url.parentElement.parentElement.classList.add('col-xs-12', 'col-sm-12', 'col-md-12')
                url.parentElement.parentElement.classList.remove('col-xs-8', 'col-sm-8', 'col-md-8')
                url.parentElement.parentElement.parentElement.removeChild(folder);
            }
        }
    };
    if(folder === null){
        addfolder(menu.options[menu.selectedIndex].value);
    }
    menu.addEventListener("change", (e)=>{
        const { value } = menu.options[menu.selectedIndex];
        addfolder(value);
    });


    form.addEventListener('submit', (e)=>{
        e.preventDefault();
        const { value } = menu.options[menu.selectedIndex];
        const menuid = value.split("/")[0];
        menu.options[menu.selectedIndex].value = menuid;
        form.submit();
    });
    const permission = document.querySelector('#permissionDiv');
    if(permission !== null){
        const permissionparent = permission.parentElement
        const togglePermissionOption = document.querySelector("#addPermission");
        togglePermissionOption.addEventListener("change", (e)=>{
            if(!togglePermissionOption.checked){
                togglePermissionOption.checked = true;
                permissionparent.removeChild(permission);
                togglePermissionOption.checked = false;
            }else{
                togglePermissionOption.checked = false;
                permissionparent.insertBefore(permission, togglePermissionOption.parentElement)
                togglePermissionOption.checked = true;

            }
        });
    }
</script>
@endsection

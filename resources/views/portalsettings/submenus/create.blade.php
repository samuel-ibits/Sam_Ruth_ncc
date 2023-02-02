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
            {!! Form::open(array('route' => 'submenus.store','method'=>'POST', 'id'=>'create', 'class'=>'@if ($errors->any())was-validated @endif')) !!}
            {{ Form::token() }}
            <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-material floating open">
                        <select name="menu" id="menu" class="form-control">
                            <option value="" selected = "true">Select menu</option>
                            @foreach ($menus as $menu)
                            <option value="{{$menu->id}}/{{$menu->folder}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                        <label for="menu">Menu</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-material floating">
                        <input type="text" name="name" id="name" class='@error("name") is-invalid @enderror form-control' value="{{ old('name') }}">
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
                        <input type="text" name="url" id="url" class='@error("url") is-invalid @enderror form-control' value="{{ old('url') }}">
                        <label for="url">{{ __('URL') }}</label>
                    </div>
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @if (count($permissions) > 0)
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating open" id="permissionDiv">
                            <select name="permission" id="permission" class="form-control">
                                <option value="" selected = "true">Select permission</option>
                                @foreach($permissions as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
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
                            <span class="css-control-indicator"></span> {{ __('Add a permission') }}
                        </label>
                    </div>
                </div>
            @endif

            <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-material floating">
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
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
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
            {!! Form::close() !!}
        <a href="{{route('submenus.index')}}" class="nav-link"><- back to Submenus</a>
        </div>
    </div>
@endsection
@section('js_aftera')
<script>
    const menu = document.querySelector("#menu");
    const url = document.querySelector("#url");
    const form = document.querySelector("#create");

    const addfolder = (value)=>{
        let folder = document.querySelector('.folder');
        if(value !== ""){
            const arr = value.split("/")
            const [, ...foldernames] = arr;
            const foldername = foldernames.join("  /  ")
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
    addfolder(menu.options[menu.selectedIndex].value);
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
        debugger;
    if(permission !== null){
        debugger;
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

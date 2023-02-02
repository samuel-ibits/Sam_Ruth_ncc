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
            <h3 class="block-title">Create Permission</h3>
            <div class="block-options">
                <a href="{{route('permissions.index')}}" class="btn-block-option">&#8592; back to permissions</a>
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
            <form action="{{route('permissions.store') }}" method="POST" class="@if ($errors->any()) was-valdated @endif">
                @csrf
                <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-material floating">
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
            </div>
            @if (count($submenus) > 0)
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating open" id="submenuDiv">
                            <select name="submenu" id="submenu" class="form-control @error('submenu') is-invalid @enderror">
                                <option value="" selected >Select Submenu</option>
                                @foreach($submenus as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                            <label for="submenu">{{ __('Submenu') }}</label>
                        </div>
                        @error('submenu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label class="css-control css-control-primary css-checkbox">
                            <input type="checkbox" id="addSubmenu" class="css-control-input" checked>
                            <span class="css-control-indicator"></span> {{ __('Add a submenu') }}
                        </label>
                    </div>
                </div>
            @endif
            <div class="form-group row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-material floating">
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
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
            </form>
            <a href="{{route('permissions.index')}}" class="nav-link">&#8592; back to permissions</a>
        </div>
    </div>
@endsection

@section('js_aftera')
<script>

    const submenu = document.querySelector('#submenuDiv');
    if(submenu !== null){
        const submenuparent = submenu.parentElement
        const toggleSubmenuOption = document.querySelector("#addSubmenu");
        toggleSubmenuOption.addEventListener("change", (e)=>{
            if(!toggleSubmenuOption.checked){
                submenuparent.removeChild(submenu);
                toggleSubmenuOption.checked = false;
            }else{
                console.log(submenuparent);
                submenuparent.insertBefore(submenu, toggleSubmenuOption.parentElement)
                toggleSubmenuOption.checked = true;

            }
        });
    }
</script>
@endsection

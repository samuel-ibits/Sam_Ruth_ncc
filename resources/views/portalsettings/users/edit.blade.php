@extends( Auth::user()->isAdmin? 'layouts.portalsettings':'layouts.backend')
@section(Auth::user()->isAdmin?'css_aftera':'css_after')
    <style>
        .invalid-feedback{
            display: block;
        }

        .is-invalid {
            box-shadow: 0 1px 0 #ef5350 !important;
        }
    </style>
@endsection
@section(Auth::user()->isAdmin? 'contenta':'content')
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Create Menu</h3>
            <div class="block-options">
                <a href="{{ route(Auth::user()->isAdmin?'users.index':'portalsettings.users.index') }}" class="btn-block-option">&#8592; back to users</a>
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
            <form method="POST" action="{{ route('register') }}" class="@if ($errors->any()) was-valdated @endif">
                @csrf
                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="off" autofocus>

                            <label for="name" class="">{{ __('Name') }}</label>
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
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="off">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-material floating open">
                        <select id="role" class="form-control @error('role') is-invalid @enderror" name="role[]"  required>
                                <option value="">Select a role</option>
                                @for ($i = 0; $i < count($roles); $i++)
                                    <option value="{{array_keys($roles)[$i]}}" {{ $user->role === array_keys($roles)[$i]? ' selected':'' }}>{{$roles[array_keys($roles)[$i]]}}</option>
                                @endfor
                            </select>
                            <label for="role" class="">{{ __('Role') }}</label>
                        </div>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                @if (Auth::user()->isAdmin)
                    <div class="form-group row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <label class="css-control css-control-primary css-checkbox">
                                <input type="checkbox" id="isAdmin" name="isAdmin" class="css-control-input" checked value="1" >
                                <span class="css-control-indicator"></span> {{ __('Make system admin') }}
                            </label>
                        </div>
                    </div>
                @else
                    <input type="hidden" name="isAdmin" value="false" >
                @endif
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
            <a href="{{route('users.index')}}" class="nav-link">&#8592; back to users</a>
        </div>
    </div>
@endsection
@section(Auth::user()->isAdmin?'js_aftera':'js_after')
    <script>
        const isAdmin = document.querySelector('#isAdmin');
        isAdmin.addEventListener("change", (e)=>{
            isAdmin.value = +isAdmin.checked
        })
    </script>
@endsection

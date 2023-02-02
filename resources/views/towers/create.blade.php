@extends('layouts.backend')
@section('css_after')
<link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('js/plugins/intlTelInput/intlTelInput.min.css')}}">
<link rel="stylesheet" href="{{asset('js/plugins/intlTelInput/demo.css')}}">
<link rel="stylesheet" href="{{asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
<style>

    .iti__country-list {
        z-index: 3;
    }
.hide{
    display: none;
}
</style>
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Create Tower <small>Create tower</small></h2>
        <div class="block">
            <div class="block-content block-content-full" style="min-height: 267px;">
                <!-- Step 1 -->

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
                <form action="{{ route('towers.store') }}" id="create" method="post">
                    @csrf
                    @if ($saved == true)
                        <div class="alert alert-info">
                            <h4><strong>Continue!</strong></h4>
                            <p>You have filled the first stage of the application.</p>
                            <input type="hidden" name="continue" value="{{$towerdraftid}}">
                            <p>Click <button type="submit" class="btn btn-secondary">here</button> to continue with the application</p>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-material floating open">
                                        <select class="form-control" id="tower_owner" name="tower_owner">
                                            <option value="">Select Tower Owner</option>
                                            @forelse ($towerowners as $towerowner)
                                                <option value="{{$towerowner->id}}" {{old("tower_owner") == $towerowner->id? " selected":""}}>{{$towerowner->name}}</option>
                                            @empty
                                            <option value="" selected>No Tower Owner</option>
                                            @endforelse
                                        </select>
                                        <label for="tower_owner">Tower Owner</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="tower_name" name="tower_name" value="{{ old('tower_name') }}">
                                        <label for="tower_name">Tower Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="ncc_identity" name="ncc_identity" value="{{old('ncc_identity')}}">
                                        <label for="ncc_identity">NCC Identity</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <textarea class="form-control" id="address" name="address">{{old('address')}}</textarea>
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-material floating open">
                                        <select class="form-control state" id="state" name="state">
                                            <option value="">Select State</option>
                                            @forelse ($states as $state)
                                                <option value="{{ $state->id }}" {{old('state') == $state->id? " selected":""}}>{{ $state->name }}</option>
                                            @empty
                                                <option value="" selected>No States</option>
                                            @endforelse
                                        </select>
                                        <label for="state">State</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input type="hidden" name="lga_id" id="lga_id" value="{{old('lga')}}">
                                        <select class="form-control" id="lga" name="lga">
                                            </select>
                                        <label for="lga">LGA</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input type="number" class="form-control" id="longitude" name="longitude" value="{{old('longitude')}}"  min="-180" max="180" maxlength="9">
                                        <label for="longitude">Longitude</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input type="number" class="form-control" id="latitude" name="latitude" value="{{old('latitude')}}"   min="-90" max="90" maxlength="9" >
                                        <label for="latitude">Latitude</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="landlord_name" name="landlord_name" value="{{old('landlord_name')}}">
                                        <label for="landlord_name">Landlord Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="contact_number" name="contact_number" value="{{old('contact_number')}}">
                                        <label for="contact_number">Contact Number</label>
                                        <span id="valid-msg" class="hide">✓ Valid</span>
                                        <span id="error-msg" class="hide"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-material floating open">
                                        <select class="form-control" id="tower_type" name="tower_type">
                                            <option value="">Select Tower Type</option>
                                            @forelse ($towertypes as $towertype)
                                                <option value="{{ $towertype->id }}" {{old('tower_type') == $towertype->id? " selected":""}}>{{ $towertype->name }}</option>
                                            @empty

                                            <option value="" selected>No Tower Type</option>
                                            @endforelse

                                        </select>
                                        <label for="tower_type">Tower Type</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-material floating">

                                        <input class="form-control" type="number" id="no_of_sections" name="no_of_sections" value="{{old('no_of_sections')}}" />
                                        <label for="no_of_sections">No of Sections</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-material floating">

                                        <input class="form-control" type="number" id="tower_height" name="tower_height" value="{{old('tower_height')}}" min="20"  max="190" />
                                        <label for="tower_height">Height (Meters)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  
                                    <div class="form-material floating open">
                                        <input class="form-control js-flatpickr" type="text" id="date_of_erection" name="date_of_erection" data-alt-input="true" data-date-format="Y-m-d" data-alt-format="F j, Y" value="{{old('date_of_erection')}}"  data-max-date="today">
                                        <label for="date_of_erection">Date of Erection</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-material floating open">
                                        <select class="form-control power" type="text" id="main_power" name="main_power">
                                            <option value="">Select Main Power</option>
                                            @forelse ($powertypes as $powertype)
                                                <option value="{{$powertype->id}}" {{old('main_power') == $powertype->id? " selected":""}}>{{$powertype->name}}</option>
                                            @empty
                                            <option value="" selected>No Main Power</option>
                                            @endforelse
                                        </select>
                                        <label for="main_power">Main Power</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-material floating open">
                                        <select class="form-control power" type="text" id="first_backup" name="first_backup">
                                            <option value="">Select First Backup</option>
                                            @forelse ($powertypes as $powertype)
                                                <option value="{{$powertype->id}}" {{old('first_backup') == $powertype->id? " selected":""}}>{{$powertype->name}}</option>
                                            @empty
                                            <option value="" selected>No First Backup</option>
                                            @endforelse
                                        </select>
                                        <label for="first_backup">First Backup</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-material floating open">
                                        <select class="form-control power" type="text" id="second_backup" name="second_backup">
                                            <option value="">Select Second Backup</option>
                                            @forelse ($powertypes as $powertype)
                                            <option value="{{$powertype->id}}" {{old('second_backup') == $powertype->id? " selected":""}}>{{$powertype->name}}</option>
                                        @empty
                                        <option value="" selected>No Second Backup</option>
                                        @endforelse
                                        </select>
                                        <label for="second_backup">Second Backup</label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-secondary">Save</button>
                            </div>
                        </div>
                    @endif


                </form>
                <!-- END Step 5 -->

            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
@section('js_after')
<script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>
<script src="{{ asset('js/plugins/intlTelInput/intlTelInput.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/pages/create_tower.js') }}"></script>
@endsection

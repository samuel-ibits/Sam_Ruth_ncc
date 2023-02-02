@extends('layouts.backend')
@section('css_after')
<link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Create Tower <small>Create tower</small></h2>
            <!-- Simple Wizard 2 -->
            <div class="js-wizard-simple block">
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-alt nav-fill">
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('admin/towers/createtower/step1') ? ' active' : '' }}" href="/admin/towers/createtower/step1">1. Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('admin/towers/createtower/step2') ? ' active' : '' }}" href="/admin/towers/createtower/step2">2. Tenant Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('admin/towers/createtower/step3') ? ' active' : '' }}" href="/admin/towers/createtower/step3">3. Maintenance Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('admin/towers/createtower/step4') ? ' active' : '' }}" href="/admin/towers/createtower/step4">4. Audit Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->is('admin/towers/createtower/step5') ? ' active' : '' }}" href="/admin/towers/createtower/step5">5. Insurance information</a>
                    </li>
                </ul>
                <!-- END Step Tabs -->

                <!-- Form -->
                    <!-- Steps Content -->
                <div class="block-content block-content-full tab-content" style="min-height: 267px;">
                    <!-- Step 1 -->
                    <div class="tab-pane{{ request()->is('admin/towers/createtower/step1') ? ' active' : '' }}" id="wizard-simple2-step1" >
                        <form action="be_forms_wizard.html" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="tower_name" name="tower_name">
                                            <label for="tower_name">Tower Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="tower_name" name="tower_name">
                                            <label for="tower_name">Longitude</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="tower_name" name="tower_name">
                                        <label for="tower_name">Latitude</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <textarea class="form-control" id="address" name="address"></textarea>
                                            <label for="address">Address</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control state" id="state" name="state"></select>
                                            <label for="state">State</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control" id="lga" name="lga"></select>
                                            <label for="lga">LGA</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="tower_name" name="tower_name">
                                            <label for="tower_name">Landlord Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="tower_name" name="tower_name">
                                            <label for="tower_name">Contact Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="tower_name" name="tower_name">
                                            <label for="tower_name">First Contact Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="ncc_identity" name="ncc_identity">
                                            <label for="ncc_identity">NCC Identity</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control" id="tower_type" name="tower_type"></select>
                                            <label for="tower_type">Tower Type</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">

                                            <input class="form-control" type="text" id="no_of_sections" name="no_of_sections">
                                            <label for="no_of_sections">No of Sections</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">

                                            <input class="form-control" type="text" id="tower_height" name="tower_height">
                                            <label for="tower_height">Height</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control js-flatpickr" type="text" id="date_of_erection" name="date_of_erection">
                                            <label for="date_of_erection">Date of Erection</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <textarea name="major_defect" id="major_defect" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control" id="towerowner" name="towerowner"></select>
                                            <label for="towerowner">Tower Owner</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control power" type="text" id="main_power" name="main_power"></select>
                                            <label for="main_power">Main Power</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control power" type="text" id="first_backup" name="first_backup"></select>
                                            <label for="first_backup">First Backup</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control power" type="text" id="second_backup" name="second_backup"></select>
                                            <label for="second_backup">Second Backup</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Step 1 -->
                    <!-- Step 2 -->
                    <div class="tab-pane{{ request()->is('admin/towers/createtower/step2') ? ' active' : '' }}" id="wizard-simple2-step2" >
                        <form action="">
                            <div class="row">
                                <div class="block mx-auto my-2 border">
                                    <div class="block-header block-header-default">
                                        Tenant 1
                                    </div>
                                    <div class="block-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="tenant_name1" id="tenant_name1" class="form-control tenant_name" aria-describedby="helpId"></select>
                                                        <label for="tenant_name1">Tenant</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_make" id="antenna_make" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_make">Antenna Make</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_model" id="antenna_model" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_model">Antenna Model</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="antenna_type" id="antenna_type" class="form-control" aria-describedby="helpId"></select>
                                                        <label for="antenna_type">Antenna Type</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="configurations" id="configurations" class="form-control" aria-describedby="helpId" />
                                                        <label for="configurations">Configurations</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="type_approval" id="" class="form-control" aria-describedby="helpId" />
                                                        <label for="type_approval">NCC Type Approval Details</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block mx-auto my-2 border">
                                    <div class="block-header block-header-default">
                                        Tenant 2
                                    </div>
                                    <div class="block-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="tenant_name2" id="tenant_name2" class="form-control tenant_name" aria-describedby="helpId"></select>
                                                        <label for="tenant_name2">Tenant</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_make" id="antenna_make" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_make">Antenna Make</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_model" id="antenna_model" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_model">Antenna Model</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="antenna_type" id="antenna_type" class="form-control" aria-describedby="helpId"></select>
                                                        <label for="antenna_type">Antenna Type</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="configurations2" id="configurations2" class="form-control" aria-describedby="helpId" />
                                                        <label for="configurations2">Configurations</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="type_approval2" id="type_approval2" class="form-control" aria-describedby="helpId" />
                                                        <label for="type_approval2">NCC Type Approval Details</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block mx-auto my-2 border">
                                    <div class="block-header block-header-default">
                                        Tenant 3
                                    </div>
                                    <div class="block-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="tenant_name3" id="tenant_name3" class="form-control tenant_name" aria-describedby="helpId"></select>
                                                        <label for="tenant_name3">Tenant</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_make3" id="antenna_make3" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_make3">Antenna Make</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_model3" id="antenna_model3" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_model3">Antenna Model</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="antenna_type3" id="antenna_type3" class="form-control" aria-describedby="helpId"></select>
                                                        <label for="antenna_type3">Antenna Type</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="configurations3" id="configurations3" class="form-control" aria-describedby="helpId" />
                                                        <label for="configurations3">Configurations</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="type_approval3" id="type_approval3" class="form-control" aria-describedby="helpId" />
                                                        <label for="type_approval3">NCC Type Approval Details</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block mx-auto my-2 border">
                                    <div class="block-header block-header-default">
                                        Tenant 4
                                    </div>
                                    <div class="block-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="tenant_name4" id="tenant_name4" class="form-control tenant_name" aria-describedby="helpId"></select>
                                                        <label for="tenant_name4">Tenant</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_make4" id="antenna_make4" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_make4">Antenna Make</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_model4" id="antenna_model4" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_model4">Antenna Model</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="antenna_type4" id="antenna_type4" class="form-control" aria-describedby="helpId"></select>
                                                        <label for="antenna_type4">Antenna Type</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="configurations4" id="configurations4" class="form-control" aria-describedby="helpId" />
                                                        <label for="configurations4">Configurations</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="type_approval4" id="type_approval4" class="form-control" aria-describedby="helpId" />
                                                        <label for="type_approval4">NCC Type Approval Details</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block mx-auto my-2 border">
                                    <div class="block-header block-header-default">
                                        Tenant 5
                                    </div>
                                    <div class="block-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="tenant_name5" id="tenant_name5" class="form-control tenant_name" aria-describedby="helpId"></select>
                                                        <label for="tenant_name5">Tenant</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_make5" id="antenna_make5" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_make5">Antenna Make</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_model5" id="antenna_model5" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_model5">Antenna Model</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="antenna_type5" id="antenna_type5" class="form-control" aria-describedby="helpId"></select>
                                                        <label for="antenna_type5">Antenna Type</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="configurations5" id="configurations5" class="form-control" aria-describedby="helpId" />
                                                        <label for="configurations5">Configurations</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="type_approval5" id="type_approval5" class="form-control" aria-describedby="helpId" />
                                                        <label for="type_approval5">NCC Type Approval Details</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block mx-auto my-2 border">
                                    <div class="block-header block-header-default">
                                        Tenant 6
                                    </div>
                                    <div class="block-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="tenant_name6" id="tenant_name6" class="form-control tenant_name" aria-describedby="helpId"></select>
                                                        <label for="tenant_name6">Tenant</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_make6" id="antenna_make6" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_make6">Antenna Make</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_model6" id="antenna_model6" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_model6">Antenna Model</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="antenna_type6" id="antenna_type6" class="form-control" aria-describedby="helpId"></select>
                                                        <label for="antenna_type6">Antenna Type</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="configurations6" id="configurations6" class="form-control" aria-describedby="helpId" />
                                                        <label for="configurations6">Configurations</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="type_approval6" id="type_approval6" class="form-control" aria-describedby="helpId" />
                                                        <label for="type_approval6">NCC Type Approval Details</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block mx-auto my-2 border">
                                    <div class="block-header block-header-default">
                                        Tenant 7
                                    </div>
                                    <div class="block-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="tenant_name7" id="tenant_name7" class="form-control tenant_name" aria-describedby="helpId"></select>
                                                        <label for="tenant_name7">Tenant</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_make7" id="antenna_make7" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_make7">Antenna Make</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_model7" id="antenna_model7" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_model7">Antenna Model</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="antenna_type7" id="antenna_type7" class="form-control" aria-describedby="helpId"></select>
                                                        <label for="antenna_type7">Antenna Type</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="configurations7" id="configurations7" class="form-control" aria-describedby="helpId" />
                                                        <label for="configurations7">Configurations</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="type_approval7" id="type_approval7" class="form-control" aria-describedby="helpId" />
                                                        <label for="type_approval7">NCC Type Approval Details</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block mx-auto my-2 border">
                                    <div class="block-header block-header-default">
                                        Tenant 8
                                    </div>
                                    <div class="block-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="tenant_name8" id="tenant_name8" class="form-control tenant_name" aria-describedby="helpId"></select>
                                                        <label for="tenant_name8">Tenant</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_make8" id="antenna_make8" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_make8">Antenna Make</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_model8" id="antenna_model8" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_model8">Antenna Model</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="antenna_type8" id="antenna_type8" class="form-control" aria-describedby="helpId"></select>
                                                        <label for="antenna_type8">Antenna Type</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="configurations8" id="configurations8" class="form-control" aria-describedby="helpId" />
                                                        <label for="configurations8">Configurations</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="type_approval8" id="type_approval8" class="form-control" aria-describedby="helpId" />
                                                        <label for="type_approval8">NCC Type Approval Details</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block mx-auto my-2 border">
                                    <div class="block-header block-header-default">
                                        Tenant 9
                                    </div>
                                    <div class="block-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="tenant_name9" id="tenant_name9" class="form-control tenant_name" aria-describedby="helpId"></select>
                                                        <label for="tenant_name9">Tenant</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_make9" id="antenna_make9" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_make9">Antenna Make</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_model9" id="antenna_model9" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_model9">Antenna Model</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="antenna_type9" id="antenna_type9" class="form-control" aria-describedby="helpId"></select>
                                                        <label for="antenna_type9">Antenna Type</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="configurations9" id="configurations9" class="form-control" aria-describedby="helpId" />
                                                        <label for="configurations9">Configurations</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="type_approval9" id="type_approval9" class="form-control" aria-describedby="helpId" />
                                                        <label for="type_approval9">NCC Type Approval Details</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block mx-auto my-2 border">
                                    <div class="block-header block-header-default">
                                        Tenant 10
                                    </div>
                                    <div class="block-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="tenant_name10" id="tenant_name10" class="form-control tenant_name" aria-describedby="helpId"></select>
                                                        <label for="tenant_name10">Tenant</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_make10" id="antenna_make10" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_make10">Antenna Make</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="antenna_model10" id="antenna_model10" class="form-control" aria-describedby="helpId" />
                                                        <label for="antenna_model10">Antenna Model</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <select name="antenna_type10" id="antenna_type10" class="form-control" aria-describedby="helpId"></select>
                                                        <label for="antenna_type10">Antenna Type</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="configurations10" id="configurations10" class="form-control" aria-describedby="helpId" />
                                                        <label for="configurations10">Configurations</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-material floating">
                                                        <input type="text" name="type_Approval10" id="type_Approval10" class="form-control" aria-describedby="helpId" />
                                                        <label for="type_Approval10">NCC Type Approval Details</label>
                                                        {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Step 2 -->
                    <!-- Step 3 -->
                    <div class="tab-pane{{ request()->is('admin/towers/createtower/step3') ? ' active' : '' }}" id="wizard-simple2-step3" >
                        <form action="be_forms_wizard.html" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control" id="maintenance_agent" name="maintenance_agent"></select>
                                            <label for="maintenance_agent">Maintenance Agent</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="agent_ncc_license" name="agent_ncc_license">
                                            <label for="agent_ncc_license">Agent NCC License ID</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control" id="maintenance_engineer" name="maintenance_engineer"></select>
                                            <label for="maintenance_engineer">Maintenance Engineer</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control" id="maintenance_schedule" name="maintenance_schedule">
                                                <option value="0" selected>Select Maintenance Schedule</option>
                                                <option value="1">Weekly</option>
                                                <option value="2">Bi-weekly</option>
                                            </select>
                                            <label for="maintenance_schedule">Maintenance Schedule</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Step 3 -->
                    <!-- Step 4 -->
                    <div class="tab-pane{{ request()->is('admin/towers/createtower/step4') ? ' active' : '' }}" id="wizard-simple2-step4" >
                        <form action="be_forms_wizard.html" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control" id="audit_agent" name="audit_agent"></select>
                                            <label for="audit_agent">Audit Agent</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input type="text" class="form-control js-flatpickr" id="audit_schedule" name="audit_schedule" />
                                            <label for="audit_schedule">Audit Schedule</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="css-control css-control-sm css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="technical" name="audit_feature[]">
                                            <span class="css-control-indicator"></span> Technical
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="css-control css-control-sm css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="environmental" name="audit_feature[]">
                                            <span class="css-control-indicator"></span> Environmental
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="css-control css-control-sm css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="radiation" name="audit_feature[]">
                                            <span class="css-control-indicator"></span> Radiation
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="css-control css-control-sm css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="structural" name="audit_feature[]">
                                            <span class="css-control-indicator"></span> Structural
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- END Step 4 -->
                    <!-- Step 5 -->
                    <div class="tab-pane{{ request()->is('admin/towers/createtower/step5') ? ' active' : '' }}" id="wizard-simple2-step5" >
                        <form action="be_forms_wizard.html" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control" id="insurer" name="insurer"></select>
                                            <label for="insurer">Insurer</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control" id="insurance_policy" name="insurance_policy">
                                                <option value="0">Select Insurance Policy</option>
                                                <option value="1">Comprehensive</option>
                                                <option value="2">Public Liability</option>
                                            </select>
                                            <label for="insurance_policy">Insurance Policy</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <select class="form-control" id="insurance_limit" name="insurance_limit"></select>
                                            <label for="insurance_limit">Insurance limit</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="number" id="insurance_premium" name="insurance_premium" />
                                            <label for="insurance_premium">Insurance Premium</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input type="text" class="form-control js-flatpickr" id="expiry_date" name="expiry_date">
                                            <label for="expiry_date">Expiry date</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- END Step 5 -->
                </div>
                    <!-- END Steps Content -->

                    <!-- Steps Navigation -->
                <div class="block-content block-content-sm block-content-full bg-body-light">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-alt-secondary" data-wizard="prev">
                                <i class="fa fa-angle-left mr-5"></i> Previous
                            </button>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-alt-secondary" data-wizard="next">
                                Next <i class="fa fa-angle-right ml-5"></i>
                            </button>
                            <button type="submit" class="btn btn-alt-primary d-none" data-wizard="finish">
                                <i class="fa fa-check mr-5"></i> Submit
                            </button>
                        </div>
                    </div>
                </div>
                <!-- END Steps Navigation -->
            </div>
        </div>
    <!-- END Page Content -->
@endsection
@section('js_after')
<script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
{{-- <script src="{{ mix('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ mix('js/plugins/jquery-validation/additional-methods.js') }}"></script> --}}
<script src="{{ mix('js/pages/be_forms_wizard.js') }}"></script>


<script>
    jQuery(function(){ Codebase.helpers(['flatpickr', 'datepicker']);});
    const state = [{"name":"Abia","capital":"Umuahia"},{"name":"Adamawa","capital":"Yola"},{"name":"Akwa Ibom","capital":"Uyo"},{"name":"Anambra","capital":"Awka"},{"name":"Bauchi","capital":"Bauchi"},{"name":"Benue","capital":"Makurdi"},{"name":"Borno","capital":"Maiduguri"},{"name":"Bayelsa","capital":"Yenagoa"},{"name":"Cross River","capital":"Calabar"},{"name":"Delta","capital":"Asaba"},{"name":"Ebonyi","capital":"Abakaliki"},{"name":"Edo","capital":"Benin"},{"name":"Ekiti","capital":"Ado-Ekiti"},{"name":"Enugu","capital":"Enugu"},{"name":"Federal Capital Territory","capital":"Abuja"},{"name":"Gombe","capital":"Gombe"},{"name":"Jigawa","capital":"Dutse"},{"name":"Imo","capital":"Owerri"},{"name":"Kaduna","capital":"Kaduna"},{"name":"Kebbi","capital":"Birnin Kebbi"},{"name":"Kano","capital":"Kano"},{"name":"Kogi","capital":"Lokoja"},{"name":"Lagos","capital":"Ikeja"},{"name":"Katsina","capital":"Katsina"},{"name":"Kwara","capital":"Ilorin"},{"name":"Nasarawa","capital":"Lafia"},{"name":"Niger","capital":"Minna"},{"name":"Ogun","capital":"Abeokuta"},{"name":"Ondo","capital":"Akure"},{"name":"Rivers","capital":"Port Harcourt"},{"name":"Oyo","capital":"Ibadan"},{"name":"Osun","capital":"Osogbo"},{"name":"Sokoto","capital":"Sokoto"},{"name":"Plateau","capital":"Jos"},{"name":"Taraba","capital":"Jalingo"},{"name":"Yobe","capital":"Damaturu"},{"name":"Zamfara","capital":"Gusau"}];

    // map the options for each state to an array of option strings
    const stateoption = state.map((val, ind)=> `<option value="${val.name.toLowerCase()}">${val.name}</option>` );

    const lga = [
        {"state":"Adamawa","alias":"adamawa","lgas":["Demsa","Fufure","Ganye","Gayuk","Gombi","Grie","Hong","Jada","Larmurde","Madagali","Maiha","Mayo Belwa","Michika","Mubi North","Mubi South","Numan","Shelleng","Song","Toungo","Yola North","Yola South"]},
        {"state":"Akwa Ibom","alias":"akwa_ibom","lgas":["Abak","Eastern Obolo","Eket","Esit Eket","Essien Udim","Etim Ekpo","Etinan","Ibeno","Ibesikpo Asutan","Ibiono-Ibom","Ikot Abasi","Ika","Ikono","Ikot Ekpene","Ini","Mkpat-Enin","Itu","Mbo","Nsit-Atai","Nsit-Ibom","Nsit-Ubium","Obot Akara","Okobo","Onna","Oron","Udung-Uko","Ukanafun","Oruk Anam","Uruan","Urue-Offong/Oruko","Uyo"]},
        {"state":"Anambra","alias":"anambra","lgas":["Aguata","Anambra East","Anaocha","Awka North","Anambra West","Awka South","Ayamelum","Dunukofia","Ekwusigo","Idemili North","Idemili South","Ihiala","Njikoka","Nnewi North","Nnewi South","Ogbaru","Onitsha North","Onitsha South","Orumba North","Orumba South","Oyi"]},
        {"state":"Ogun","alias":"ogun","lgas":["Abeokuta North","Abeokuta South","Ado-Odo/Ota","Egbado North","Ewekoro","Egbado South","Ijebu North","Ijebu East","Ifo","Ijebu Ode","Ijebu North East","Imeko Afon","Ikenne","Ipokia","Odeda","Obafemi Owode","Odogbolu","Remo North","Ogun Waterside","Shagamu"]},
        {"state":"Ondo","alias":"ondo","lgas":["Akoko North-East","Akoko North-West","Akoko South-West","Akoko South-East","Akure North","Akure South","Ese Odo","Idanre","Ifedore","Ilaje","Irele","Ile Oluji/Okeigbo","Odigbo","Okitipupa","Ondo West","Ose","Ondo East","Owo"]},
        {"state":"Rivers","alias":"rivers","lgas":["Abua/Odual","Ahoada East","Ahoada West","Andoni","Akuku-Toru","Asari-Toru","Bonny","Degema","Emuoha","Eleme","Ikwerre","Etche","Gokana","Khana","Obio/Akpor","Ogba/Egbema/Ndoni","Ogu/Bolo","Okrika","Omuma","Opobo/Nkoro","Oyigbo","Port Harcourt","Tai"]},
        {"state":"Bauchi","alias":"bauchi","lgas":["Alkaleri","Bauchi","Bogoro","Damban","Darazo","Dass","Gamawa","Ganjuwa","Giade","Itas/Gadau","Jama'are","Katagum","Kirfi","Misau","Ningi","Shira","Tafawa Balewa","Toro","Warji","Zaki"]},
        {"state":"Benue","alias":"benue","lgas":["Agatu","Apa","Ado","Buruku","Gboko","Guma","Gwer East","Gwer West","Katsina-Ala","Konshisha","Kwande","Logo","Makurdi","Obi","Ogbadibo","Ohimini","Oju","Okpokwu","Oturkpo","Tarka","Ukum","Ushongo","Vandeikya"]},
        {"state":"Borno","alias":"borno","lgas":["Abadam","Askira/Uba","Bama","Bayo","Biu","Chibok","Damboa","Dikwa","Guzamala","Gubio","Hawul","Gwoza","Jere","Kaga","Kala/Balge","Konduga","Kukawa","Kwaya Kusar","Mafa","Magumeri","Maiduguri","Mobbar","Marte","Monguno","Ngala","Nganzai","Shani"]},
        {"state":"Bayelsa","alias":"bayelsa","lgas":["Brass","Ekeremor","Kolokuma/Opokuma","Nembe","Ogbia","Sagbama","Southern Ijaw","Yenagoa"]},
        {"state":"Cross River","alias":"cross_river","lgas":["Abi","Akamkpa","Akpabuyo","Bakassi","Bekwarra","Biase","Boki","Calabar Municipal","Calabar South","Etung","Ikom","Obanliku","Obubra","Obudu","Odukpani","Ogoja","Yakuur","Yala"]},
        {"state":"Delta","alias":"delta","lgas":["Aniocha North","Aniocha South","Bomadi","Burutu","Ethiope West","Ethiope East","Ika North East","Ika South","Isoko North","Isoko South","Ndokwa East","Ndokwa West","Okpe","Oshimili North","Oshimili South","Patani","Sapele","Udu","Ughelli North","Ukwuani","Ughelli South","Uvwie","Warri North","Warri South","Warri South West"]},
        {"state":"Ebonyi","alias":"ebonyi","lgas":["Abakaliki","Afikpo North","Ebonyi","Afikpo South","Ezza North","Ikwo","Ezza South","Ivo","Ishielu","Izzi","Ohaozara","Ohaukwu","Onicha"]},
        {"state":"Edo","alias":"edo","lgas":["Akoko-Edo","Egor","Esan Central","Esan North-East","Esan South-East","Esan West","Etsako Central","Etsako East","Etsako West","Igueben","Ikpoba Okha","Orhionmwon","Oredo","Ovia North-East","Ovia South-West","Owan East","Owan West","Uhunmwonde"]},
        {"state":"Ekiti","alias":"ekiti","lgas":["Ado Ekiti","Efon","Ekiti East","Ekiti South-West","Ekiti West","Emure","Gbonyin","Ido Osi","Ijero","Ikere","Ilejemeje","Irepodun/Ifelodun","Ikole","Ise/Orun","Moba","Oye"]},
        {"state":"Enugu","alias":"enugu","lgas":["Awgu","Aninri","Enugu East","Enugu North","Ezeagu","Enugu South","Igbo Etiti","Igbo Eze North","Igbo Eze South","Isi Uzo","Nkanu East","Nkanu West","Nsukka","Udenu","Oji River","Uzo Uwani","Udi"]},
        {"state":"Federal Capital Territory","alias":"abuja","lgas":["Abaji","Bwari","Gwagwalada","Kuje","Kwali","Municipal Area Council"]},
        {"state":"Gombe","alias":"gombe","lgas":["Akko","Balanga","Billiri","Dukku","Funakaye","Gombe","Kaltungo","Kwami","Nafada","Shongom","Yamaltu/Deba"]},
        {"state":"Jigawa","alias":"jigawa","lgas":["Auyo","Babura","Buji","Biriniwa","Birnin Kudu","Dutse","Gagarawa","Garki","Gumel","Guri","Gwaram","Gwiwa","Hadejia","Jahun","Kafin Hausa","Kazaure","Kiri Kasama","Kiyawa","Kaugama","Maigatari","Malam Madori","Miga","Sule Tankarkar","Roni","Ringim","Yankwashi","Taura"]},
        {"state":"Oyo","alias":"oyo","lgas":["Afijio","Akinyele","Atiba","Atisbo","Egbeda","Ibadan North","Ibadan North-East","Ibadan North-West","Ibadan South-East","Ibarapa Central","Ibadan South-West","Ibarapa East","Ido","Ibarapa North","Irepo","Iseyin","Itesiwaju","Iwajowa","Kajola","Lagelu","Ogbomosho North","Ogbomosho South","Ogo Oluwa","Olorunsogo","Oluyole","Ona Ara","Orelope","Ori Ire","Oyo","Oyo East","Saki East","Saki West","Surulere Oyo State"]},
        {"state":"Imo","alias":"imo","lgas":["Aboh Mbaise","Ahiazu Mbaise","Ehime Mbano","Ezinihitte","Ideato North","Ideato South","Ihitte/Uboma","Ikeduru","Isiala Mbano","Mbaitoli","Isu","Ngor Okpala","Njaba","Nkwerre","Nwangele","Obowo","Oguta","Ohaji/Egbema","Okigwe","Orlu","Orsu","Oru East","Oru West","Owerri Municipal","Owerri North","Unuimo","Owerri West"]},
        {"state":"Kaduna","alias":"kaduna","lgas":["Birnin Gwari","Chikun","Giwa","Ikara","Igabi","Jaba","Jema'a","Kachia","Kaduna North","Kaduna South","Kagarko","Kajuru","Kaura","Kauru","Kubau","Kudan","Lere","Makarfi","Sabon Gari","Sanga","Soba","Zangon Kataf","Zaria"]},
        {"state":"Kebbi","alias":"kebbi","lgas":["Aleiro","Argungu","Arewa Dandi","Augie","Bagudo","Birnin Kebbi","Bunza","Dandi","Fakai","Gwandu","Jega","Kalgo","Koko/Besse","Maiyama","Ngaski","Shanga","Suru","Sakaba","Wasagu/Danko","Yauri","Zuru"]},
        {"state":"Kano","alias":"kano","lgas":["Ajingi","Albasu","Bagwai","Bebeji","Bichi","Bunkure","Dala","Dambatta","Dawakin Kudu","Dawakin Tofa","Doguwa","Fagge","Gabasawa","Garko","Garun Mallam","Gezawa","Gaya","Gwale","Gwarzo","Kabo","Kano Municipal","Karaye","Kibiya","Kiru","Kumbotso","Kunchi","Kura","Madobi","Makoda","Minjibir","Nasarawa","Rano","Rimin Gado","Rogo","Shanono","Takai","Sumaila","Tarauni","Tofa","Tsanyawa","Tudun Wada","Ungogo","Warawa","Wudil"]},
        {"state":"Kogi","alias":"kogi","lgas":["Ajaokuta","Adavi","Ankpa","Bassa","Dekina","Ibaji","Idah","Igalamela Odolu","Ijumu","Kogi","Kabba/Bunu","Lokoja","Ofu","Mopa Muro","Ogori/Magongo","Okehi","Okene","Olamaboro","Omala","Yagba East","Yagba West"]},
        {"state":"Osun","alias":"osun","lgas":["Aiyedire","Atakunmosa West","Atakunmosa East","Aiyedaade","Boluwaduro","Boripe","Ife East","Ede South","Ife North","Ede North","Ife South","Ejigbo","Ife Central","Ifedayo","Egbedore","Ila","Ifelodun","Ilesa East","Ilesa West","Irepodun","Irewole","Isokan","Iwo","Obokun","Odo Otin","Ola Oluwa","Olorunda","Oriade","Orolu","Osogbo"]},
        {"state":"Sokoto","alias":"sokoto","lgas":["Gudu","Gwadabawa","Illela","Isa","Kebbe","Kware","Rabah","Sabon Birni","Shagari","Silame","Sokoto North","Sokoto South","Tambuwal","Tangaza","Tureta","Wamako","Wurno","Yabo","Binji","Bodinga","Dange Shuni","Goronyo","Gada"]},
        {"state":"Plateau","alias":"plateau","lgas":["Bokkos","Barkin Ladi","Bassa","Jos East","Jos North","Jos South","Kanam","Kanke","Langtang South","Langtang North","Mangu","Mikang","Pankshin","Qua'an Pan","Riyom","Shendam","Wase"]},
        {"state":"Taraba","alias":"taraba","lgas":["Ardo Kola","Bali","Donga","Gashaka","Gassol","Ibi","Jalingo","Karim Lamido","Kumi","Lau","Sardauna","Takum","Ussa","Wukari","Yorro","Zing"]},
        {"state":"Yobe","alias":"yobe","lgas":["Bade","Bursari","Damaturu","Fika","Fune","Geidam","Gujba","Gulani","Jakusko","Karasuwa","Machina","Nangere","Nguru","Potiskum","Tarmuwa","Yunusari"]},
        {"state":"Zamfara","alias":"zamfara","lgas":["Bakura","Bukkuyum","Bungudu","Gummi","Gusau","Kaura Namoda","Maradun","Shinkafi","Maru","Talata Mafara","Tsafe","Zurmi"]},
        {"state":"Lagos","alias":"lagos","lgas":["Agege","Ajeromi-Ifelodun","Alimosho","Amuwo-Odofin","Badagry","Apapa","Epe","Eti Osa","Ibeju-Lekki","Ifako-Ijaiye","Ikeja","Ikorodu","Kosofe","Lagos Island","Mushin","Lagos Mainland","Ojo","Oshodi-Isolo","Shomolu","Surulere Lagos State"]},
        {"state":"Katsina","alias":"katsina","lgas":["Bakori","Batagarawa","Batsari","Baure","Bindawa","Charanchi","Danja","Dandume","Dan Musa","Daura","Dutsi","Dutsin Ma","Faskari","Funtua","Ingawa","Jibia","Kafur","Kaita","Kankara","Kankia","Katsina","Kurfi","Kusada","Mai'Adua","Malumfashi","Mani","Mashi","Matazu","Musawa","Rimi","Sabuwa","Safana","Sandamu","Zango"]},
        {"state":"Kwara","alias":"kwara","lgas":["Asa","Baruten","Edu","Ilorin East","Ifelodun","Ilorin South","Ekiti Kwara State","Ilorin West","Irepodun","Isin","Kaiama","Moro","Offa","Oke Ero","Oyun","Pategi"]},{"state":"Nasarawa","alias":"nasarawa","lgas":["Akwanga","Awe","Doma","Karu","Keana","Keffi","Lafia","Kokona","Nasarawa Egon","Nasarawa","Obi","Toto","Wamba"]},
        {"state":"Niger","alias":"niger","lgas":["Agaie","Agwara","Bida","Borgu","Bosso","Chanchaga","Edati","Gbako","Gurara","Katcha","Kontagora","Lapai","Lavun","Mariga","Magama","Mokwa","Mashegu","Moya","Paikoro","Rafi","Rijau","Shiroro","Suleja","Tafa","Wushishi"]},
        {"state":"Abia","alias":"abia","lgas":["Aba North","Arochukwu","Aba South","Bende","Isiala Ngwa North","Ikwuano","Isiala Ngwa South","Isuikwuato","Obi Ngwa","Ohafia","Osisioma","Ugwunagbo","Ukwa East","Ukwa West","Umuahia North","Umuahia South","Umu Nneochi"]}
    ]

    // State select box
    const selectstate = document.querySelector("#state")

    // LGA select box
    const selectlga = document.querySelector("#lga")

    // Initial value for state
    selectstate.innerHTML = `<option value="0" selected>Select State</option>`;

    // convert the array of state options to a string using an empty string as a delimiter and adding them to the selectstate select box
    selectstate.innerHTML += stateoption.join('');

    // change event for state to provide lgas under a state
    selectstate.addEventListener("change", function(){
        // debugger;

        // using first array destructuring to the the filter result as the object the object destructuring to get the values of lga with is an array
        const  [{lgas}] = lga.filter(val=> this.options[this.selectedIndex].value === val.alias)

        // Initial value for lga
        selectlga.innerHTML = `<option value="0" selected>Select LGA</option>`;

        //console.log(lgas);

        // map the options for each lga to an array of option strings
        const lgaoption = lgas.map((val, ind)=> `<option value="${val.toLowerCase()}">${val}</option>`);

        // convert the array of lga options to a string using an empty string as a delimiter
        selectlga.innerHTML += lgaoption.join('');

        //console.log(lgas);
    });

    // Tower type data
    const towerType = ["Self Support", "Monopole", "Lattice", "Guy", "Roof-Top"];

    //option tage array for powertype
    const towerTypeOption = towerType.map(val=> `<option value="${val}">${val}</option>`)


    // selectbox for tower_type
    const selectTowerType = document.querySelector("#tower_type");

    // Default selected option for tower type
    selectTowerType.innerHTML = `<option value="0" selected>Select Tower Type</option>`;

    //populate the select box with towertypeoption constant
    selectTowerType.innerHTML += towerTypeOption.join('');

    // List of all select box with power class
    const power = document.querySelectorAll('.power');

    const powerType = ["Solar", "Grid", "Generator"];

    // powertype option arrau
    const powerTypeOption = powerType.map(val=> `<option value="${val}">${val}</option>`);

    // Default selected option for tower type using the unshift
    powerTypeOption.unshift(`<option value="0" selected >Select Power source</option>`);

    // Populate all instances of select box with power class
    power.forEach(val=> val.innerHTML = powerTypeOption);

    // Array of tenants
    const tenants = ["MTN", "Airtel", "9mobile", "Glo", "Spectranet", "U-Mobile"];

    // List of select box with class of tenant_name
    const tenantName = document.querySelectorAll(".tenant_name");

    // tenant_name option list tag
    const tenantNameOption = tenants.map(val=> `<option value="${val}">${val}</option>`);

    // Default selected option for tower type using the unshift
    tenantNameOption.unshift(`<option value="0" selected >Select Tenant name</option>`);

    // Populate all instances of select box with tenant_name class
    tenantName.forEach(val=> val.innerHTML = tenantNameOption);

    // Array of maintenance agents
    const maintenantAgents = ["BUIDNETICS", "MAKASA SUN", "OLASCO GROUP", "SUNSHINE TECH", "ORIOWO ENGIR",
                                "DELMEC", "HIGH-WAVES", "SUNSHINE TECH"];

    // Maintenance agent select box
    const maintenantAgent = document.querySelector("#maintenance_agent");

    // Maintenance_agent option list tag
    const maintenantAgentOption = maintenantAgents.map(val=> `<option value="${val}">${val}</option>`);

    // Default selected option for tower type using the unshift
    maintenantAgentOption.unshift(`<option value="0" selected>Select Maintenance Agent</option>`);

    // Add Maintenance Agent option to maintenantAgent select box
    maintenantAgent.innerHTML = maintenantAgentOption.join('');


    // Array of maintenance engineers
    const maintenantEngineers = ["IFEANYI AJETUNMOBI", "TUNDE OGUNSANWO", "EBELE JONATHAN", "YAKUBU GOWON", "ABBA KYARI",
            "DAVID PANTANMI", "DUROJAIYE OLABIYI", "OSIYALE TUNDE", "USMAN MALA", "SUNDAY EHANIRE", "PAULEN TALLEN",
            "TUNDE BAKARE", "AMINU TAMBUWAL", "ABDUL GANDUJE"];

    // Maintenance_engineer option list tag
    const maintenantEngineerOption = maintenantEngineers.map(val=> `<option value="${val}">${val}</option>`);

    // Default selected option for tower type using the unshift
    maintenantEngineerOption.unshift(`<option value="0" selected>Select Maintenance Engineer</option>`);

    const maintenanceEngineer = document.querySelector("#maintenance_engineer");
    maintenanceEngineer.innerHTML = maintenantEngineerOption.join('');

    // audit agent list
    const auditAgents = ["OSACOMMS", "XOUSIA", "APLIWIN", "AIRMAP", "ARYEL"];

    // Select box for audit agent
    const auditAgent = document.querySelector("#audit_agent");

    // Create string of option for audit agent
    auditAgentOption = auditAgents.map(val=> `<option value="${val}">${val}</option>`);

    // Add the default for selected option to the array
    auditAgentOption.unshift(`<option value="0" selected>Select Audit Agent</option>`);

    //Populate the Audit agant
    auditAgent.innerHTML = auditAgentOption.join('');

    // Array of insurers
    const insurers = ["Royal Exchange", "Sunu Assurance", "FBN Insurance", "AIICO"]

    // Select box for insurer
    const insurer = document.querySelector("#insurer");

    // Create string of option for insurer
    insurerOption = insurers.map(val=> `<option value="${val}">${val}</option>`);

    // Add the default for selected option to the array
    insurerOption.unshift(`<option value="0" selected>Select Insurer</option>`);

    //Populate the insurer select box
    insurer.innerHTML = insurerOption.join('');

// Array insurance limit
const insuranceLimits = ["&#8358;20m", "&#8358;30m", "&#8358;40m", "&#8358;50m"];

// Select box for insuranceLimit
const  insuranceLimit= document.querySelector("#insurance_limit");

// Create string of option for insuranceLimit
const insuranceLimitOption = insuranceLimits.map(val=> `<option value="${val}">${val}</option>`);

// Add the default for selected option to the array
insuranceLimitOption.unshift(`<option value="0" selected>Select Insurance Limit</option>`);

//Populate the insurer select box
insuranceLimit.innerHTML = insuranceLimitOption.join('');

// Array of towe owners
const towerOwners = ["IHS", "PAT", "ATC", "GLO"];

// Select box for insuranceLimit
const  towerOwner= document.querySelector("#towerowner");

// Create string of option for tower owner
const towerOwnerOption = towerOwners.map(val=> `<option value="${val}">${val}</option>`);

// Add the default for selected option to the array
towerOwnerOption.unshift(`<option value="0" selected>Select Tower Owner</option>`);

//Populate the insurer select box
towerOwner.innerHTML = towerOwnerOption.join('');
</script>
@endsection

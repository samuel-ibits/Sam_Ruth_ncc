@extends('layouts.backend')
@section('css_after')
<link rel="stylesheet" href="{{ asset('js/plugins/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/intlTelInput/intlTelInput.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/intlTelInput/demo.css') }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('js/plugins/jquery-auto-complete/jquery.auto-complete.min.css') }}">
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
<div class="content">
  <h2 class="content-heading">Edit {{$tower->name}} Tower <small>edit tower</small></h2>
  <!-- Simple Wizard 2 -->
  <input type="hidden" name="id" id="tower_id" value="{{$tower->id}}">
  <div class="js-wizard-simple block">
    <!-- Step Tabs -->
    <ul class="nav nav-tabs nav-tabs-alt nav-fill">
      <li class="nav-item">
        <a class="nav-link{{ request()->input('tab') === "step1" ? ' active' : '' }}" href="{{ url('towers/').'/'.$tower->id}}/edit?tab=step1">1. Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link{{ request()->input('tab') === "step2" ? ' active' : '' }}" href="{{ url('towers/').'/'.$tower->id}}/edit?tab=step2">2. Insurance Information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link{{ request()->input('tab') === "step3" ? ' active' : '' }}" href="{{url('towers/').'/'.$tower->id}}/edit?tab=step3">3. Tenant Information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link{{ request()->input('tab') === "step4" ? ' active' : '' }}" href="{{ url('towers/').'/'.$tower->id}}/edit?tab=step4">4. Maintenance Information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link{{ request()->input('tab') === "step5" ? ' active' : '' }}" href="{{ url('towers/').'/'.$tower->id}}/edit?tab=step5">5. Audit Information</a>
      </li>
    </ul>
    <!-- END Step Tabs -->

    <!-- Form -->
    <!-- Steps Content -->
    <div class="block-content block-content-full tab-content" style="min-height: 267px;">

      <!-- Step 1 -->
      <div class="tab-pane{{ request()->input('tab') === "step1" ? ' active' : '' }}" id="wizard-simple2-step1" >

        <form action="{{route('towers.update', [$tower, 'tab'=>request()->input('tab')])}}" method="POST" id="profile">
          @csrf
          @method("PUT")
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <div class="form-material floating open">
                  <select class="form-control" id="tower_owner" name="tower_owner" aria-readonly="true" readonly>
                    <option value="">Select Tower Owner</option>
                    @forelse ($towerowners as $towerowner)
                    <option value="{{$towerowner->id}}" {{$tower->tower_owner_id == $towerowner->id? " selected":""}}>{{ $towerowner->name }}</option>
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
                  <input class="form-control" type="text" id="tower_name" name="tower_name" value="{{ $tower->name }}">
                  <label for="tower_name">Tower Name</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <div class="form-material floating">
                  <input class="form-control" type="text" id="ncc_identity" name="ncc_identity" value="{{$tower->ncc_identity}}">
                  <label for="ncc_identity">NCC Identity</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="form-material floating">
                  <textarea class="form-control" id="address" name="address">{{$tower->address}}</textarea>
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
                    <option value="{{ $state->id }}" {{$tower->lga->state->id == $state->id? " selected":""}}>{{ $state->name }}</option>
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
                  <input type="hidden" name="lga_id" id="lga_id" value="{{$tower->lga}}">
                  <select class="form-control" id="lga" name="lga">
                    <option value="">Select LGA</option>
                    @forelse ($lgas as $lga)
                    <option value="{{ $lga->id }}" {{$tower->lga->id == $lga->id? " selected":""}}>{{ $lga->name }}</option>
                    @empty
                    <option value="" selected>No Lgas</option>
                    @endforelse
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
                  <input type="text" class="form-control" id="longitude" name="longitude" value="{{$tower->longitude}}" min="-180" max="180" maxlength="9">
                  <label for="longitude">Longitude</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-material floating">
                  <input type="text" class="form-control" id="latitude" name="latitude" value="{{$tower->latitude}}" min="-90" max="90" maxlength="9" >
                  <label for="latitude">Latitude</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-material floating">
                  <input class="form-control" type="text" id="landlord_name" name="landlord_name" value="{{$tower->landlord_name}}">
                  <label for="landlord_name">Landlord Name</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-material">
                  <input class="form-control" type="text" id="contact_number" name="contact_number" value="{{$tower->contact_number}}">
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
                    <option value="{{ $towertype->id }}" {{$tower->towertype->id == $towertype->id? " selected":""}}>{{ $towertype->name }}</option>
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

                  <input class="form-control" type="number" id="no_of_sections" name="no_of_sections" value="{{$tower->no_of_sections}}" />
                  <label for="no_of_sections">No of Sections</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-material floating">
                  <input class="form-control" type="number" id="tower_height" name="tower_height" value="{{$tower->height}}" min="20"  max="190" />
                  <label for="tower_height">Height</label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-material floating open">
                  <input class="form-control js-flatpickr" type="text" id="date_of_erection" name="date_of_erection" data-alt-input="true" data-date-format="Y-m-d" data-alt-format="F j, Y" data-default-date="{{$tower->erected_at}}" data-max-date="today">
                  <label for="date_of_erection">Date of Erection</label>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="" value="{{$i=0}}">

          @forelse ($powersourcetypes as $powersourcetype)  
          <div class="row">                              
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-material floating open">
                  <input type="hidden" value="{{$powersourcetype->id}}" name="power_source_type[{{$powersourcetype->key}}]" />

                  {{-- @forelse ($powersourcetypestower as $powersourcetypetower)
                    @if($powersourcetypetower->powersupplier !== null)

                    {{dd($powersourcetypetower->powersupplier === null)}}
                    @else 

                    @endif

                    @empty
                    @endforelse  --}}
                    {{-- {{dd($powersuppliertypes)}} --}}
                    <select class="form-control power-supplier-type" id="power_supplier_type-{{$i}}" name="power_supplier_type[{{$powersourcetype->key}}]">
                      <option value="">Select  {{ $powersourcetype->name }} </option>

                      @forelse ($powersuppliertypes as $powersuppliertype)
                      @forelse ($powersourcetypestower as $powersourcetypetower)
                      {{-- {{print_r($powersourcetypetower)}} --}}
                      @if($powersourcetypetower->powersupplier == null &&  $powersourcetype->id == $powersourcetypetower->powersourcetype->id)
                      <option value="{{ $powersuppliertype->id }}" selected>{{ $powersuppliertype->name }}</option>
                      @break
                      @elseif($powersourcetypetower->powersupplier != null && $powersourcetypetower->powersupplier->power_supplier_type_id == $powersuppliertype->id &&  $powersourcetype->id == $powersourcetypetower->powersourcetype->id)
                      <option value="{{ $powersuppliertype->id }}" selected>{{ $powersuppliertype->name }}</option>
                      @break
                      @elseif($powersourcetype->id == $powersourcetypetower->powersourcetype->id)
                      <option value="{{ $powersuppliertype->id }}">{{ $powersuppliertype->name }}</option>
                      @else    
                      @continue
                      @endif
                      @empty
                      <option value="{{ $powersuppliertype->id }}">{{ $powersuppliertype->name }}</option>
                      @endforelse 
                      @empty
                      <option value="" selected>No Power Source Type</option>
                      @endforelse
                    </select>
                    <label for="power_supplier_type[{{$powersourcetype->key}}]">{{$powersourcetype->name}}</label>
                  </div>
                </div>
              </div>                              
              <div class="col-md-6">
                <div class="form-group">
                  <div class="form-material floating open">
                    <input type="hidden" class="form-control power-supplier-key" value="{{$powersourcetype->key}}">
                    @forelse ($powersourcetypestower as $powersourcetypetower)
                    @if($powersourcetypetower->powersupplier === null && $powersourcetype->id === $powersourcetypetower->powersourcetype->id)
                    <input type="text" class="form-control power-supplier-input" name= "power_supplier[{{$powersourcetype->key}}]" value="{{$powersourcetypetower->others}}">
                    <select class="form-control power-supplier hide" id="power_supplier-{{$i}}" name="" disabled>
                      <option value="" selected>Please Select {{$powersourcetype->name}} to see the Power Suppliers under it.</option>
                    </select>
                    @break
                    @elseif($powersourcetypetower->powersupplier !== null && $powersourcetype->id === $powersourcetypetower->powersourcetype->id)  
                    <input type="text" class="form-control power-supplier-input hide" name= "power_supplier_input[{{$powersourcetype->key}}]" disabled>
                    <select class="form-control power-supplier" id= "power_supplier-{{$i}}" name="power_supplier[{{$powersourcetype->key}}]">
                      @forelse($powersuppliers as $powersupplier)
                      <option value="{{$powersupplier->id}}" {{$powersupplier->id === $powersourcetypetower->powersupplier->id? "selected":"" }}>{{$powersupplier->name}}</option>
                      @empty
                      @endforelse
                    </select>
                    @break
                    @else
                    @continue
                    @endif 
                    @empty
                    <input type="text" class="form-control power-supplier-input hide" name= "power_supplier_input[{{$powersourcetype->key}}]" disabled>
                    <select class="form-control power-supplier" id= "power_supplier-{{$i}}" name="power_supplier[{{$powersourcetype->key}}]">
                      <option value="" selected>Please Select {{$powersourcetype->name}} to see the Power Suppliers under it.</option>                                        
                    </select>
                    @endforelse

                    <label for="power_supplier[{{$powersourcetype->key}}]">Power Supplier</label>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" name="" value="{{$i++}}">
            @empty
            <div></div>
            @endforelse
            <div class="row">
              <div class="col-md-4">
                <button type="submit" class="btn btn-secondary">Save & Continue</button>
              </div>
            </div>
          </form>
        </div>
        <!-- END Step 1 -->
        <!-- Step 2 -->
        <div class="tab-pane{{ request()->input('tab') === "step2" ? ' active' : '' }}" id="wizard-simple2-step2" >
          <div id="insurance_accordion_parent" role="tablist" aria-multiselectable="true">
            <div class="block block-rounded mb-2">
              <div class="block-header" role="tab" id="insurance_accordion_toggler">
                <button type="button" class="font-w600 btn btn-secondary" id="AddInsurance" data-toggle="collapse" data-target="#insurance_accordion" aria-expanded="true" aria-controls="insurance_accordion">Add Insurance</button>
              </div>
              <div id="insurance_accordion" class="collapse" role="tabpanel" aria-labelledby="insurance_accordion_toggler">
                <div class="block-content">
                  <form action="{{route('towers.addtowerinsurance', [$tower->id, 'tab'=>request()->input('tab')])}}" method="POST" class="insurance-form" id="insurance">
                    @csrf
                    <input type="hidden" name="" id="_insurancemethod">
                    <input type="hidden" name="add_insurance_tower" id='add_insurance_tower' value="{{$tower->id}}">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="form-material floating open">
                            <select class="form-control" id="insurance_company" name="insurance_company">
                              <option value="">Select Insurer</option>
                              @forelse ($insurancecompanies as $insurancecompany)
                              <option value="{{$insurancecompany->id}}" >{{$insurancecompany->name}}</option>
                              @empty
                              <option value="">No Insurer available</option>
                              @endforelse
                            </select>
                            <label for="insurance_company">Insurer</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="form-material floating open">
                            <select class="form-control" id="insurance_policy" name="insurance_policy">
                              <option value="">Select Insurance Policy</option>
                              @forelse ($insurancepolicies as $insurancepolicy)
                              <option value="{{$insurancepolicy->id}}" >{{$insurancepolicy->name}}</option>
                              @empty
                              <option value="">No Insurance Policy</option>
                              @endforelse
                            </select>
                            <label for="insurance_policy">Insurance Policy</label>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="form-material floating open">
                            <select class="form-control" id="insurance_limit" name="insurance_limit">
                              <option value="">Select Insurance Limit</option>
                              @forelse ($insurancelimits as $insurancelimit)
                              <option value="{{$insurancelimit->id}}" >{{$insurancelimit->amount}}</option>
                              @empty
                              <option value="">No Insurance Limit</option>
                              @endforelse
                            </select>
                            <label for="insurance_limit">Insurance limit</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-material floating">
                            <input class="form-control" type="text" id="insurance_premium" name="insurance_premium" />
                            <label for="insurance_premium">Insurance Premium</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-material floating">
                            <input type="text" class="form-control js-flatpickr insurance-expiry-date" id="insurance_expiry_date" name="insurance_expiry_date" data-alt-input="true" data-date-format="Y-m-d" data-alt-format="F j, Y" value="{{old('insurance_expiry_date')}}" data-min-date="today">
                            <label for="insurance_expiry_date">Expiry date</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="offset-md-3"></div>
                      <div class="col-md-3 text-center"><button type="submit" class="btn btn-success add-insurance">Save</button></div>
                      <div class="col-md-3 text-center"><button type="button"  class="btn btn-danger" id="resetinsurance">reset</button></div>

                      <div class="offset-md-3"></div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          {{-- <h3 class="block-title">Insurance</h3> --}}
          <div class="table-responsive">
            <table class="table table-striped table-vcenter">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Name</th>
                  <th style="width: 30%;">Policy</th>
                  <th style="width: 15%;">Limit</th>
                  <th style="width: 15%;">Premium</th>
                  <th style="width: 15%;">Expiry</th>
                  <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <input type="hidden" name="" value="{{$i=0}}">
                @forelse ($towerinsurancecompanies as $insurancecompany)
                <input type="hidden" name="" value="{{++$i}}">
                <tr>
                  <td>@if (request()->input('page'))
                    {{$i + ((request()->input('page') - 2) * 5)}}
                    @else
                    {{$i}}
                  @endif</td>
                  <td >
                    {{$insurancecompany->name}}
                  </td>
                  <td >
                    {{ $insurancecompany->pivot->insurancepolicy->name}}
                  </td>
                  <td >
                    {{$insurancecompany->pivot->insurancelimit->amount}}
                  </td>
                  <td >
                    {{$insurancecompany->pivot->insurancepremium}}
                  </td>
                  <td >
                    {{$insurancecompany->pivot->expires_at}}
                  </td>
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-secondary edit-tower-insurance" data-toggle="tooltip" title="Edit">
                        <i class="fa fa-pencil"></i>
                        <input type="hidden" value="{{$insurancecompany->pivot->id}}" />
                      </button>
                      <form action="{{route('towers.deletetowerinsurance', [$insurancecompany->pivot->id, 'tab'=>'step2'])}}" method="post" class="delete-tower-insurance-form">
                        @csrf
                        @method('Delete')
                        <input type="hidden" id="delete_tower" name="delete_tower" value="{{$tower->id}}" />
                        <input type="hidden" id="delete_insurance_company" name="delete_insurance_company" value="{{$insurancecompany->pivot->id}}" />
                        <button type="submit" class="btn btn-sm btn-secondary delete-tower-insurance" data-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i></button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7" class="text-center">No Insurance for this tower yet</td>
                  </tr>
                  @endforelse


                </tbody>
              </table>
              {{$towerinsurancecompanies->appends(['tab' => request()->input('tab') ])->links()}}
            </div>
          </div>
          <!-- END Step 2 -->
          <!-- Step 3 -->
          <div class="tab-pane{{ request()->input('tab') === "step3" ? ' active' : '' }}" id="wizard-simple2-step3" >
            <div id="tenant_accordion_parent" role="tablist" aria-multiselectable="true">
              <div class="block block-rounded mb-2">
                <div class="block-header" role="tab" id="tenant_accordion_heading">
                  <button type="button" class="font-w600 btn btn-secondary" id="AddTenant" data-toggle="collapse" data-target="#tenant_accordion_body" aria-expanded="true" aria-controls="tenant_accordion_body">Add Tenant</button>
                </div>
                <div id="tenant_accordion_body" class="collapse" role="tabpanel" aria-labelledby="tenant_accordion_heading">
                  <div class="block-content">
                    <form action="{{route('towers.addtowertenant', [$tower->id, 'tab'=>request()->input('tab')])}}" method="POST" class="tenant-form" id="tenant">
                      @csrf
                      <input type="hidden" name="" id="_tenantmethod">
                      <input type="hidden" name="add_tenant_tower" id='add_tenant_tower' value="{{$tower->id}}">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="form-material floating open">
                              <input placeholder="Type to search for tenants eg. MTN, Airtel, Glo" class="js-autocomplete form-control" type="text" id="search_tenant_name" name="search_tenant_name" />
                              <label for="search_tenant_name">Tenant</label>
                            </div>
                            <input type="hidden" name="tenant_name" id="tenant_name" class="tenant_name" value="0">
                          </div>
                        </div>
                        {{-- <button class="btn btn-secondary" title="if you can't find a tenant, click here to add new">+</button> --}}
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="form-material floating open">
                              <select class="form-control" id="antenna_type" name="antenna_type">
                                <option value="">Select Antenna Type</option>
                                @forelse ($antennatypes as $antennatype)
                                <option value="{{$antennatype->id}}" >{{$antennatype->name}}</option>
                                @empty
                                <option value="">No antenna Type</option>
                                @endforelse
                              </select>
                              <label for="antenna_type">antenna Type</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="form-material floating open">
                              <input placeholder= "Type to search for Antenna Make eg. Huawei, CommScope, Mobi, RFS, etc."class="js-autocomplete form-control" type="text" id="search_antenna_make" name="search_antenna_make" />
                              <label for="search_antenna_make">Antenna Make</label>
                            </div>
                            <input type="hidden" name="antenna_make" id="antenna_make" class="antenna_make" value="0">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <div class="form-material floating open">
                              <input placeholder="Type to search for Antenna Model eg. 27011949-001 DXX-790-960/1710-2690-65/65-15i/17.5i-M/M-R, etc." class="js-autocomplete form-control" type="text" id="search_antenna_model" name="search_antenna_model" />
                              <label for="search_antenna_model">Antenna Model</label>
                            </div>
                          </div>
                          <input type="hidden" name="antenna_model" id="antenna_model" class="antenna_model" value="0">
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="form-material floating">
                              <input class="form-control" type="text" id="configuration" name="configuration" />
                              <label for="configuration">Configuration</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="offset-md-3"></div>
                        <div class="col-md-3 text-center"><button type="submit" class="btn btn-success add-tenant">Save</button></div>
                        <div class="col-md-3 text-center"><button type="button" class="btn btn-danger text-white" id="resettenant">reset</button></div>
                        <div class="offset-md-3"></div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <h3 class="block-title">List of Tenants Under this tower</h3>
            <div class="table-responsive">
              <table class="table table-striped table-vcenter">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th style="width: 30%;">Antenna Make</th>
                    <th style="width: 30%;">Antenna Type</th>
                    <th style="width: 15%;">Antenna Model</th>
                    <th style="width: 15%;">Configurations</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <input type="hidden" name="" value="{{$i=0}}">
                  @forelse ($towertenants as $tenant)
                  <input type="hidden" name="" value="{{++$i}}">
                  <tr>
                    <td>@if (request()->input('page'))
                      {{$i + ((request()->input('page') - 2) * 5)}}
                      @else
                      {{$i}}
                    @endif</td>
                    <td >
                      {{ $tenant->name }}
                    </td>
                    <td >
                      {{ $tenant->pivot->antennamake->name }}
                    </td>
                    <td>
                      {{ $antennatype->name}}
                    </td>
                    <td>
                      {{ $tenant->pivot->antennamodel->name }}
                    </td>
                    <td>
                      {{ $tenant->pivot->configuration }}
                    </td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-secondary edit-tower-tenant" data-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil"></i>
                          <input type="hidden" value="{{$tenant->pivot->id}}" />
                        </button>
                        <form action="{{route('towers.deletetowertenant', [$tenant->pivot->id, 'tab'=>'step2'])}}" method="post" class="delete-tower-tenant-form">
                          @csrf
                          @method('Delete')
                          <input type="hidden" id="delete_tower{{$tower->id}}" class="delete-tower" name="delete_tower" value="{{$tower->id}}" />
                          <input type="hidden" id="delete_tenant{{$tower->id}}" class="delete-tenant" name="delete_tenant" value="{{$tenant->pivot->id}}" />
                          <button type="submit" class="btn btn-sm btn-secondary delete-tower-tenant" data-toggle="tooltip" title="Delete">
                            <i class="fa fa-times"></i></button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="7" class="text-center">No tenant for this tower yet</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                {{$towertenants->appends(['tab' => request()->input('tab') ])->links()}}
              </div>
            </div>
            <!-- END Step 3 -->
            <!-- Step 4 -->
            <div class="tab-pane{{ request()->input('tab') === "step4" ? ' active' : '' }}" id="wizard-simple2-step4" >
              <form action="@if ($tower->maintenanceengineer) {{route('towers.updatetowermaintenance', [$tower->maintenanceengineer->id, 'tab'=>request()->input('tab')])}} @else {{route('towers.addtowermaintenance', [$tower, 'tab'=>request()->input('tab')])}} @endif" method="post" id="maintenance" class="maintenance-form">
                @csrf
                @if ($tower->maintenanceengineer)
                @method("PUT")
                @endif
                <input type="hidden" name="add_maintenance_tower" id="add_maintenance_tower" value="{{$tower->id}}">
                <p><strong>To Change any Information, Kindly click the Reset Button.</strong></p>
                <div class="row">
                  <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                      <div class="form-material floating">
                          
                        <input  type="text" value="@if($tower->maintenanceengineer){{$tower->maintenanceengineer->maintenanceagent->name}}@endif" id="search_maintenance_agent_name" name="search_maintenance_agent_name" class="form-control">
                        <label for="search_maintenance_agent_name">Maintenance Agent</label>
                        
                      </div>
                      <input type="hidden" value="@if($tower->maintenanceengineer){{$tower->maintenanceengineer->maintenance_agent_id}}@else 0 @endif" id="maintenance_agent_name" name="maintenance_agent_name">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                      <div class="form-material floating">
                        <input class="form-control" type="text" id="agent_ncc_licence" name="agent_ncc_licence" value="@if($tower->maintenanceengineer){{$tower->maintenanceengineer->maintenanceagent->ncc_licence}}@endif">
                        <label for="agent_ncc_licence">Agent NCC License</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                      <div class="form-material floating">
                        <input type="text" class="form-control" id="search_maintenance_engineer_name" name="search_maintenance_engineer_name" value="@if($tower->maintenanceengineer){{$tower->maintenanceengineer->name}}@endif" @if($tower->maintenanceengineer) readonly @endif>
                        <label for="search_maintenance_engineer_name">Maintenance Engineer</label>
                      </div>
                      <input type="hidden" value="@if($tower->maintenanceengineer){{$tower->maintenanceengineer->id}}@else 0 @endif" id="maintenance_engineer_name" name="maintenance_engineer_name">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                      
                    <div class="form-group">
                      <div class="form-material floating">
                             <input type="text" class="form-control js-flatpickr" id="maintenance_schedule" name="maintenance_schedule" data-alt-input="true" data-date-format="Y-m-d" data-alt-format="F j, Y" value="{{old('maintenance_schedule')}}" data-min-date="today">
                        <label for="maintenance_schedule">Maintenance Schedule</label>
                          <!--#############################-->
                    <!--<div class="form-material floating">
                            <input type="text" class="form-control js-flatpickr" id="maintenance_schedule" name="maintenance_schedule" data-alt-input="true" data-date-format="Y-m-d" data-alt-format="F j, Y" value="{{old('maintenance_schedule')}}" data-min-date="today">
                            <label for="maintenance_schedule">Maintenance Schedule</label>
                          </div>-->
                          <!--######################### -->
                      </div>
                    </div>
                  
                  </div>
                </div>
                <div class="row">
                  <button type="submit" class="btn btn-success @if($tower->maintenanceengineer) ml-auto mr-3 btn-update-maintenance @endif">@if($tower->maintenanceengineer)Update @else Create @endif maintenance information</button>
                  @if($tower->maintenanceengineer) <button type="submit" class="btn btn-danger mr-auto" id="resetmaintenance">Reset</button>@endif

                </div>
              </form>
              {{-- <div class="table-responsive">
                <table class="table table-striped table-vcenter">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Maintenance Engineer</th>
                      <th>Maintenance Agent</th>
                      <th>Agent NCC Licence</th>
                      <th>Schedule</th>
                      <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <input type="hidden" name="" value="{{$i=0}}">
                    @forelse ($towerauditagents as $auditagent)
                    <input type="hidden" name="" value="{{++$i}}">
                    <tr>
                      <td>@if (request()->input('page'))
                        {{$i + ((request()->input('page') - 2) * 5)}}
                        @else
                        {{$i}}
                      @endif</td>
                      <td >
                        {{ $auditagent->name }}
                      </td>
                      @foreach ($audittypes as $audittype)
                      <td>
                        @foreach ($auditagent->pivot->audittypes as $item)
                        @if ($item->id === $audittype->id)
                        Yes
                        @endif
                        @endforeach
                      </td>
                      @endforeach

                      <td>
                        {{ $auditagent->pivot->audit_date }}
                      </td>
                      <td class="text-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-secondary edit-tower-audit" data-toggle="tooltip" title="Edit">
                            <i class="fa fa-pencil"></i>
                            <input type="hidden" value="{{$auditagent->pivot->id}}" />
                          </button>
                          <form action="{{route('towers.deletetowertenant', [$auditagent->pivot->id, 'tab'=>'step5'])}}" method="post" class="delete-tower-audit-form">
                            @csrf
                            @method('Delete')
                            <input type="hidden" id="delete_tower_auditr{{$tower->id}}" class="delete-tower-auditr" name="delete_tower{{$tower->id}}" value="{{$tower->id}}" />
                            <input type="hidden" id="delete_audit{{$auditagent->pivot->id}}" class="delete-audit" name="delete_audit{{$auditagent->pivot->id}}" value="{{$auditagent->pivot->id}}" />
                            <button type="submit" class="btn btn-sm btn-secondary delete-tower-audit-btn" data-toggle="tooltip" title="Delete">
                              <i class="fa fa-times"></i></button>
                            </form>
                          </div>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="8" class="text-center">No audit info for this tower yet</td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                  {{$towerauditagents->appends(['tab' => request()->input('tab') ])->links()}}
                </div> --}}
              </div>
              <!-- END Step 4 -->
              <!-- Step 5 -->
              <div class="tab-pane{{ request()->input('tab') === "step5" ? ' active' : '' }}" id="wizard-simple2-step5" >
                <div id="audit_accordion_parent" role="tablist" aria-multiselectable="true">
                  <div class="block block-rounded mb-2">
                    <div class="block-header" role="tab" id="audit_accordion_heading">
                      <button type="button" class="font-w600 btn btn-secondary" id="AddAudit" data-toggle="collapse" data-target="#audit_accordion_body" aria-expanded="true" aria-controls="audit_accordion_body">Add Audit Schedule</button>
                    </div>
                    <div id="audit_accordion_body" class="collapse" role="tabpanel" aria-labelledby="audit_accordion_heading">
                      <form method="post" action="{{ route('towers.addtowerauditschedule', [$tower, 'tab'=>request()->input('tab')]) }}" class="audit-information" {{-- @if ($tower->auditagents->last()->pivot) {{route('towers.updatetowerauditschedule', [$tower->auditagents->last()->pivot->id, 'tab'=>request()->input('tab')])}}@else{{ route('towers.addtowerauditschedule', [$tower, 'tab'=>request()->input('tab')])}}@endif --}}>
                        @csrf
                        <input type="hidden" name="" id="auditmethod" value="">
                        {{-- @if ($tower->auditagents->last()->pivot)
                          @method("PUT")
                          @endif --}}
                          <input type="hidden" name="add_audit_tower" value="{{$tower->id}}">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <p><strong> You can only add one Audit Agent per year.</strong></p>
                                <div class="form-material floating">
                                  <input placeholder="Type to search for Audit Agent eg. Xousia Associates, Props Resources, Apliwin, Kish Associates, etc." type="text" class="form-control" id="search_audit_agent_name" name="search_audit_agent_name" value="{{old('search_audit_agent_name')}}" {{-- @if ($tower->auditagents->last()->pivot){{$tower->auditagents->last()->name}}@else{{old('search_audit_agent_name')}}@endif --}} >
                                  <label for="audit_agent">Audit Agent</label>
                                </div>
                                <input type="hidden" id="audit_agent_name" value="{{old('audit_agent_name')}}" {{-- @if ($tower->auditagents->last()->pivot){{$tower->auditagents->last()->pivot->id}}@else{{old('audit_agent_name')}}@endif --}} >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="form-material floating">
                                  <input class="form-control js-flatpickr" type="text" id="audit_schedule" name="audit_schedule" data-alt-input="true" data-date-format="Y-m-d" data-alt-format="F j, Y" value="{{old('search_audit_agent_name')}}" {{-- @if($tower->auditagents->last()->pivot){{$tower->auditagents->last()->pivot->audit_date}}@endif --}}>
                                  <label for="audit_schedule">Audit Schedule</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <input type="hidden" name="" value="{{$i=0}}">
                            @forelse ($audittypes as $audittype)
                            <input type="hidden" name="" value="{{$i++}}">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="css-control css-control-sm css-control-success css-switch">
                                  <input type="radio" class="css-control-input audit_type" id="audit_type{{$audittype->id}}" name="audit_types_id" value="{{$audittype->id}}"
                                  {{-- @if ($tower->auditagents->last()->pivot)
                                    @foreach($tower->auditagents->last()->pivot->audittypes as $picked)
                                    @if($audittype->id === $picked->audit_type_id) checked
                                    @endif
                                    @endforeach
                                    @endif --}}
                                    >
                                    <input type="hidden" name="audit_types_auditagenttoweraudittype[{{$i}}]" class="auditagenttoweraudittypeid" value="0">
                                    <span class="css-control-indicator"></span> {{$audittype->name}}
                                  </label>
                                </div>
                                <!----#################################### -->
                     
                                <!----#######################-->
                              </div>
                              @empty
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label class="css-control css-control-sm css-control-success css-switch">
                                    <span class="css-control-indicator"></span> No Audit Type
                                  </label>
                                </div>
                              </div>
                              @endforelse
                            </div>
                            <div class="row">
                              {{-- <div class="form-group"> --}}
                                <button type="submit" class="btn btn-secondary add-audit mr-1 ml-auto">Save Audit information</button>
                                <button type="button" class="btn btn-danger add-audit ml-1 mr-auto" id="resetaudit">Reset</button>
                              {{-- </div> --}}
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-vcenter">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th>Audit Agent</th>
                            @foreach ($audittypes as $audittype)
                            <th>{{$audittype->name}}</th>
                            @endforeach
                            <th>Schedule</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <input type="hidden" name="" value="{{$i=0}}">
                          @forelse ($towerauditagents as $auditagent)
                          <input type="hidden" name="" value="{{++$i}}">
                          <tr>
                            <td>@if (request()->input('page'))
                              {{$i + ((request()->input('page') - 2) * 5)}}
                              @else
                              {{$i}}
                            @endif</td>
                            <td >
                              {{ $auditagent->name }}
                            </td>
                            @foreach ($audittypes as $audittype)
                            <td>
                              @foreach ($auditagent->pivot->audittypes as $item)
                              @if ($item->id === $audittype->id)
                              Yes
                              @endif
                              @endforeach
                            </td>
                            @endforeach

                            <td>
                              {{ $auditagent->pivot->audit_date }}
                            </td>
                            <td class="text-center">
                              <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary edit-tower-audit" data-toggle="tooltip" title="Edit">
                                  <i class="fa fa-pencil"></i>
                                  <input type="hidden" value="{{$auditagent->pivot->id}}" />
                                </button>
                                {{-- <form action="{{route('towers.deletetowertenant', [$auditagent->pivot->id, 'tab'=>'step5'])}}" method="post" class="delete-tower-audit-form">
                                  @csrf
                                  @method('Delete')
                                  <input type="hidden" id="delete_tower_auditr{{$tower->id}}" class="delete-tower-auditr" name="delete_tower{{$tower->id}}" value="{{$tower->id}}" />
                                  <input type="hidden" id="delete_audit{{$auditagent->pivot->id}}" class="delete-audit" name="delete_audit{{$auditagent->pivot->id}}" value="{{$auditagent->pivot->id}}" />
                                  <button type="submit" class="btn btn-sm btn-secondary delete-tower-audit-btn" data-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i></button>
                                  </form> --}}
                                </div>
                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="8" class="text-center">No audit info for this tower yet</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                        {{$towerauditagents->appends(['tab' => request()->input('tab') ])->links()}}
                      </div>

                    </div>
                    <!-- END Step 5 -->
                  </div>
                  <!-- END Steps Content -->

                  <!-- Steps Navigation -->
                  <div class="block-content block-content-sm block-content-full bg-body-light">
                    <div class="row">
                      <div class="col-6">
                        <button type="button" class="btn btn-alt-secondary previous-button" data-wizard="prev">
                          <i class="fa fa-angle-left mr-5"></i> Previous
                        </button>
                      </div>
                      <div class="col-6 text-right">
                        <button type="button" class="btn btn-alt-secondary next-button" data-wizard="next">
                          Next <i class="fa fa-angle-right ml-5"></i>
                        </button>
                        {{-- <button type="submit" class="btn btn-alt-primary d-none" data-wizard="finish">
                          <i class="fa fa-check mr-5"></i> Submit
                        </button> --}}
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
              <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
              <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>
              <script src="{{ asset('js/plugins/intlTelInput/intlTelInput.min.js') }}"></script>
              <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
              <script src="{{ asset('js/plugins/jquery-auto-complete/jquery.auto-complete.js') }}"></script>
              {{-- <script src="{{ asset('js/pages/be_forms_wizard.js') }}"></script> --}}
              <script src="{{ asset('js/pages/edit_tower.js') }}"></script>
              @endsection

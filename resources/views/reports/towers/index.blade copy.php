@extends('layouts.backend')


@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Towers <small>view towers</small></h2>
         <!-- Full Table -->
         <div>
         <form  action="{{route('search')}}" method ="POST">
                @csrf
                <br>
                <div class="container">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="form-group row">
                                <label for="date" class="col-form-label col-sm-2">From This Date Erected</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" />
                                </div>
                                <label for="date" class="col-form-label col-sm-2">To This Date Erected</label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control input-sm" id="toDate" name="toDate" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-form-label col-sm-2">Other</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-sm" id="other" name="other"placeholder="Search other..." />
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn" name="search" title="Search"><img src="https://img.icons8.com/android/24/000000/search.png"/></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="text-center bg-body-light py-2 mb-2">
                        <div class="dt-buttons btn-group flex-wrap" >          
                            <button class="btn btn-sm btn-primary buttons-copy buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span>Copy</span></button> 
                            <button class="btn btn-sm btn-primary buttons-csv buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span>CSV</span></button> 
                            <button class="btn btn-sm btn-primary buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span>Excel</span></button> 
                            <button class="btn btn-sm btn-primary buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span>PDF</span></button> 
                            <button class="btn btn-sm btn-primary buttons-print" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span>Print</span></button> </div>
                        </div>
                </div> -->
                </div>
                <br>
            </form>
         </div>
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of Towers</h3>
                
            </div>

            <div class="block-content">
                <div class="table-responsive">
                    
                    <table class="table table-striped table-vcenter js-dataTable-buttons" id="tower_profile">
                        <input type="hidden" name="" value="{{$i=0}}">
                        {{-- {{dd($towers)}} --}}
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>NCC identity</th>
                                <th>Tower Owner</th>
                                <th>Tower Type</th>
                                <th>Height</th>
                                <th>No of sections</th>
                                <th>Landlord</th>
                                <th>Contact number</th>
                                <th>address</th>
                                <th>State</th>
                                <th>LGA</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Date Erected</th>

                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($towers as $tower)
                            <input type="hidden" name="" value="{{$i++}}">
                            <tr>
                                <td>@if (request()->input('page'))
                                    {{$i + ((request()->input('page') - 1) * 5)}}
                                @else
                                    {{$i}}
                                @endif</td>
                                <td>{{$tower['name']}}</td>
                                <td>{{$tower['ncc_identity']}}</td>
                                <td>{{$tower['towerowner']['name']}}</td>
                                <td>{{$tower['towertype']['name']}}</td>
                                <td>{{$tower['height'] ." M"}}</td>
                                <td>{{$tower['no_of_sections']}} {{$tower['measurement_unit']}}</td>
                                <td>{{$tower['landlord_name']}}</td>
                                <td>{{$tower['contact_number']}}</td>
                                <td>{{$tower['address']}}</td>
                                <td>{{$tower['lga']['state']['name']}}</td>
                                <td>{{$tower['lga']['name']}}</td>
                                <td>{{$tower['longitude']}}</td>
                                <td>{{$tower['latitude']}}</td>
                                <td>{{$tower['erected_at']}}</td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>

            {{$towers->links()}}
                </div>
            </div>
        </div>
        <!-- END Full Table -->
    </div>
@endsection

@section('js_after')
@endsection

@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Report <small>view maintenance report</small></h2>
         <!-- Full Table -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of All Tower Maintenance</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter" id="tower_profile">
                        {{-- {{dd($towers)}} --}}
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Tower</th>
                                <th>Maintenance Agent</th>
                                <th>Maintenance Engineer</th>
                                <th>Schedule</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($maintenances as $maintenance)
                        @php
                        //dd($maintenance);
                        @endphp
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$maintenance['tower']['name']}}
                                <td>{{$maintenance['maintenanceagent']['name']}}</td>
                                <td>{{$maintenance['name']}}</td>
                                <td>{{$maintenance['maintenanceschedule']['name']}}</td>
                                <td>{{$maintenance['active']?'Active':'Not Active'}}</td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    {{$maintenances->links()}}
                </div>
            </div>
        </div>
        <!-- END Full Table -->
    </div>
@endsection

@section('js_after')
@endsection

@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Report <small>view tenant report</small></h2>
         <!-- Full Table -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of All Tower Tenant</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter" id="tower_profile">
                        {{-- {{dd($towers)}} --}}
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Tower</th>
                                <th>Antenna make</th>
                                <th>Antenna type</th>
                                <th>Antenna model</th>
                                <th>Configuration</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($tenants as $tenant)


                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$tenant->tenant->name}}</td>
                                <td>{{$tenant->tower->name}}</td>
                                <td>{{$tenant->antennamake->name}}</td>
                                <td>{{$tenant->antennatype->name}}</td>
                                <td>{{$tenant->antennamodel->name}}</td>
                                <td>{{$tenant->configuration}}</td>


                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    {{$tenants->links()}}
                </div>
            </div>
        </div>
        <!-- END Full Table -->
    </div>
@endsection

@section('js_after')
@endsection

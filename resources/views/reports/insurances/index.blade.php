@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Report <small>view insurance report</small></h2>
         <!-- Full Table -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of All Tower Insurance</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter" id="tower_profile">
                        {{-- {{dd($towers)}} --}}
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Tower</th>
                                <th>insurer</th>
                                <th>Insurance Policy</th>
                                <th>Insurance Limit(NGN)</th>
                                <th>Insurance Premium (NGN)</th>
                                <th>Expiry Date</th>

                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($insurances as $insurance)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$insurance['tower']['name']}}</td>
                                <td>{{$insurance['insurancecompany']['name']}}</td>
                                <td>{{$insurance['insurancepolicy']['name']}}</td>
                                <td>{{number_format($insurance['insurancelimit']['amount'], 2, ',', '.')}}</td>
                                <td>{{number_format($insurance['insurancepremium'], 2, ',', '.')}}</td>
                                <td>{{$insurance['expires_at']}}</td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    {{$insurances->links()}}
                </div>
            </div>
        </div>
        <!-- END Full Table -->
    </div>
@endsection

@section('js_after')
@endsection

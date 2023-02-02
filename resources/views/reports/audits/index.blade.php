@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Report <small>view audit report</small></h2>
         <!-- Full Table -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of All Tower Audit</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter" id="tower_profile">
                        {{-- {{dd($towers)}} --}}
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Tower</th>
                                <th>Audit Agent</th>
                                @foreach ($audittypes as $audittype)
                                <th>{{$audittype->name}}</th>
                                @endforeach
                                <th>Audit Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($audits as $audit)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$audit['tower']['name']}}</td>
                                <td>{{$audit['auditagent']['name']}}</td>
                                @foreach ($audittypes as $audittype)
                                <th>
                                    @foreach ($audit['auditagenttoweraudittypes'] as $auditagenttoweraudittype)
                                        @if ($audittype['id'] === $auditagenttoweraudittype['audit_type_id'])
                                            Yes
                                        @endif
                                    @endforeach
                                </th>
                                @endforeach
                                <td>{{$audit['audit_date']}}</td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                    {{$audits->links()}}
                </div>
            </div>
        </div>
        <!-- END Full Table -->
    </div>
@endsection

@section('js_after')
@endsection

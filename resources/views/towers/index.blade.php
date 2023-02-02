@extends('layouts.backend')

@section('content')
<div class="content">
    <h2 class="content-heading">List of Towers</h2>

    <div class="block">
        <div class="block-content block-content-full">
            <a class="btn btn-info" href="{{ route('towers.create') }}">Add</a>
            <h5>Active Towers</h5>
            <div class="table-responsive">
                <table class="table table-striped table-vcenter" id="table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Tower</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($towers as $tower)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{ $tower->name }}</td>
                            <td>{{ $tower->longitude }}</td>
                            <td>{{ $tower->latitude }}</td>
                            <td>
                                {{-- <a class="btn btn-info" href="{{ route('towers.show',$tower) }}">Show</a> --}}
                                <a class="btn btn-primary" href="{{ route('towers.edit', [$tower, "tab"=>"step1"]) }}">Edit</a>
                                {{-- {!! Form::open(['method' => 'DELETE','route' => ['towers.destroy', $towers, "tab"=>"step1"],'style'=>'display:inline', 'class'=>'delete']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!} --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$towers->links()}}
            </div>
            @if ($towerdrafts)
<!--
            <h5>Drafts</h5>
            <div class="table-responsive">
                <table class="table table-striped table-vcenter" id="table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Tower</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($towerdrafts as $tower)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{ @$tower->name }}</td>
                            <td>{{ @$tower->longitude }}</td>
                            <td>{{ @$tower->latitude }}</td>
                            <td>
                                {{-- <a class="btn btn-info" href="{{ route('towers.show',$tower) }}">Show</a> --}}
                                <a class="btn btn-primary" href="{{ route('towers.edit', [$tower, "tab"=>"step1"]) }}">Edit</a>
                                {{-- {!! Form::open(['method' => 'DELETE','route' => ['towers.destroy', $towers, "tab"=>"step1"],'style'=>'display:inline', 'class'=>'delete']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!} --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$towers->links()}}
            </div>-->
        </div>
        @endif
    </div>
</div>
@endsection
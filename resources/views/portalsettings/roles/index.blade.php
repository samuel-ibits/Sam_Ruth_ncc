@extends('layouts.portalsettings')
@section('contenta')
    <!-- Page Content -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of Roles</h3>
            </div>
            <div class="block-content">
                <a class="btn btn-info" href="{{ route('roles.create') }}">Add</a>
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter" id="table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>@if (request()->input('page'))
                                        {{++$i + ((request()->input('page') - 1) * 5)}}
                                    @else
                                        {{++$i}}
                                    @endif</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('roles.show',$role) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$roles->links()}}
                </div>
            </div>
         </div>
    @endsection

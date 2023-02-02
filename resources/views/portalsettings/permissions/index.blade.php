@extends('layouts.portalsettings')
@section('contenta')
    <!-- Page Content -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of Permissions</h3>
            </div>
            <div class="block-content">
                <a class="btn btn-info" href="{{ route('permissions.create') }}">Add</a>
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter" id="table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Permission</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->description }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$permissions->links()}}
                </div>
            </div>
         </div>
    @endsection

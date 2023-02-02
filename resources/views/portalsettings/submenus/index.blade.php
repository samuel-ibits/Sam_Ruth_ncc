@extends('layouts.portalsettings')
@section('contenta')
         <!-- Full Table -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">List of Ssubmenus</h3>
        </div>
        <div class="block-content">
            <a class="btn btn-info" href="{{ route('submenus.create') }}">Add</a>
            <div class="table-responsive">
                <table class="table table-striped table-vcenter" id="table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Submenu</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submenus as $submenu)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $submenu->name }}</td>
                                <td>{{ $submenu->description }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('submenus.show',$submenu) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('submenus.edit',$submenu->id) }}">Edit</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['submenus.destroy', $submenu->id],'style'=>'display:inline', 'class'=>'delete']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$submenus->links()}}
            </div>
        </div>
    </div>
@endsection
@section('js_aftera')
    <script>
        //alert('hi');
        const deletefrms = document.querySelectorAll('.delete');
        deletefrms.forEach(deletefrm=>{
            deletefrm.addEventListener('submit', e =>{
                e.preventDefault();
                //alert('hi');
                const conf = confirm('are you sure you want to delete');
                conf? deletefrm.submit():"";
            });
        });

    </script>
@endsection

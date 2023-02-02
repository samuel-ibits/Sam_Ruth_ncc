@extends('layouts.portalsettings')
@section('contenta')
    <!-- Page Content -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of Menus</h3>
            </div>
            <div class="block-content">
                <a class="btn btn-info" href="{{ route('menus.create') }}">Add</a>
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter" id="table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Menu</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $menu->name }}</td>
                                    <td>{{ $menu->description }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('menus.show',$menu) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('menus.edit',$menu) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['menus.destroy', $menu->id],'style'=>'display:inline', 'class'=>'delete']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$menus->links()}}
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


    @extends(Auth::user()->isAdmin === 1?'layouts.portalsettings':'layouts.backend')
    @section(Auth::user()->isAdmin === 1?'contenta':'content')

         <!-- Full Table -->
         <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List of Users</h3>
            </div>
            <div class="block-content">
                @if (Auth::user()->isAdmin)
                    <a class="btn btn-info" href="{{ route('users.create') }}">Add</a>
                @else
                    <a class="btn btn-info" href="{{ route('portalsettings.users.create') }}">Add</a>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter" id="table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                    <td>{{ $user->username?$user->username:'no username' }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @forelse ($user->roles as $role)
                                        {{ $role->name }}
                                        @empty
                                            No role added
                                        @endforelse
                                     </td>
                                    <td>
                                        @if (!$user->email_verified_at)
                                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                            @csrf
                                            <input type="hidden" name="resendverification">
                                        <input type="hidden" name="newuser" value="{{$user->id}}">
                                            <button type="submit" class="btn btn-info">{{ __('Resend verification Link') }}</button>.
                                        </form>
                                        @endif
                                        @if (Auth::user()->isAdmin)
                                        {{-- <a class="btn btn-info" href="{{ route('users.show',$user) }}">Show</a>--}}
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        @else
                                        {{-- <a class="btn btn-info" href="{{ route('portalsettings,users.show',$user) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('portalsettings.users.edit',$user) }}">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['portalsettings.users.destroy', $user],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!} --}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
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

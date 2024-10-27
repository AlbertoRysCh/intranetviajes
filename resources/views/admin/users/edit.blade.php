<x-appadminroxana-layout>

    @if (session('info'))

        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
        
    @endif

    <div class="mt-6 text-center sm:text-left">
        
    </div>

    <div class="mt-6 text-center sm:text-left">
        <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8 max-sm:px-4">
            <div class="flex flex-row text-center gap-6 mb-8 items-center max-sm:flex-col">
                <h3 class=" font-normal text-5xl">Asignar roles</h3>
            </div>
            <div class="flex flex-row items-center">
                <img src="/images/nurse.png" alt="">
                <p>Panel administrador de sus usuarios y roles</p>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="h5">Nombre:</p>
                    <p class="form-control">{{$user->name}}</p>

                    <h2 class="h5">Listado de roles</h2>
                    {!! Form::model($user, ['route' =>['admin.users.update', $user], 'method' => 'put'])!!}
                        @foreach ($roles as $role)
                            <div>
                                <label for="">
                                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1'])!!}
                                    {{$role->name}}
                                </label>
                            </div>
                        @endforeach
                        {!!Form::submit('Asignar', ['class' => 'btn btn-primary mt-2'])!!}
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>

    
        

</x-appadminroxana-layout>
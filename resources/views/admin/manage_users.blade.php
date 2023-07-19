@extends('layouts.app')

@section('content')
    <h1>Administrar usuarios</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@if (!$user->roles)
                        Sin rol asignado
                        @else
                        {{ $user->roles->first()->name }}
                    @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.assignRole', $user->id) }}" method="POST">
                            @csrf
                            <select name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit">Asignar rol</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
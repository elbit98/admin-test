@extends('layouts.app')


@section('content')
    <div class="container-fluid menu">
        <div class="row">

            <div class="nav-edit col-md-9">
                <a href="{{ route('users.create') }}" class="btn btn-info btn-xs">Create</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach ($users as $user)
                            <td>{{ $user->name }}</td>
                            <td><a href="{{ route('users.edit', ['user' => $user->id]) }}">Edit</a> | <a href="{{ route('users.delete', ['user' => $user->id]) }}">Delete</a></td>
                        @endforeach
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

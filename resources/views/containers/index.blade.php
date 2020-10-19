@extends('layouts.app')


@section('content')
    <div class="container-fluid menu">
        <div class="row">

            <div class="nav-edit col-md-9">
                <a href="{{ route('containers.create') }}" class="btn btn-info btn-xs">Create</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach ($containers as $container)
                            <td>{{ $container->name }}</td>
                            <td><a href="{{ route('containers.edit', ['container' => $container->id]) }}">Edit</a> | <a href="{{ route('containers.delete', ['$container' => $container->id]) }}">Delete</a></td>
                        @endforeach
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

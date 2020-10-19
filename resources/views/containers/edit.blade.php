@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Edit user</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <form method="post" action="{{ route('users.update', ['id' => $user->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" value="{{ $user->name }}" class="form-control" name="name"/>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" value="{{ $user->password }}" class="form-control" name="password"/>
                    </div>

                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select name="role" class="browser-default custom-select">
                            <option selected value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection

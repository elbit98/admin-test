<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserService
{

    public function all()
    {
        return User::where('id', '!=', Auth::id())->get();
    }

    public function getRoles()
    {
        return Role::all()->pluck('name');
    }

    public function store($request)
    {
        $user = User::create([
            'name' => $request->name,
            'password' => $request->password,
        ]);

        if ($request->role == 'admin' || $request->role == 'user') {
            $user->assignRole($request->role);
        }
    }

    public function update($user, $request)
    {
        $user->name = $request->name;

        if ($request->has('password')) {
            $user->password = $request->password;
        }

        $user->save();
    }

    public function delete($user)
    {
        $user->delete();
    }

}

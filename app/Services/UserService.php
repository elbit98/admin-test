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
    {    // unique:users
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

        $user_role = $user->getRoleNames()[0];

        if ($request->role == 'admin' || $request->role == 'user') {
            if ($user_role != $request->role) {
                $user->removeRole($user_role);

                $user->assignRole($request->role);
            }
        }

        $user->save();
    }

    public function delete($user)
    {
        $user->delete();
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->userService->store($request);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact($user));
    }

    public function update(User $user, Request $request)
    {
        $this->userService->update($user, $request);
    }

    public function destroy(User $user)
    {
        $this->userService->delete($user);
        return redirect()->route('users.index');
    }

}

<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'Login' => 'required|string',
            'Password' => 'required|string', 
            'Role' => 'required|string',
        ]);

        $user->update($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно обновлен.');
    }
    

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Login' => 'required|string',
            'Password' => 'required|string',
            'Role' => 'required|string',
        ]);

        User::create($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'Пользователь успешно добавлен.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu  = 'Users';
        $keyword    = $request->input('name');

        $users = User::when($request->name, function ($query, $name) {
            $query->where('name', 'like', '%' . $name . '%');
        })->latest()->paginate(10);

        $users->appends(['name' => $keyword]);

        return view('pages.users.users-index', compact('type_menu', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'Users';
        return view('pages.users.users-create', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('file');

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|unique:users',
            'phone' => 'max:20',
            'password' => 'required|min:8',
            'roles' => 'required|max:255',
            'address' => 'max:255',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => $request->roles,
            'address' => $request->address,
        ]);

        if ($image) {

            $path = time() . '.' . $image->getClientOriginalExtension();
            $image->move('img/avatar/', $path);

            $user->update([
                'foto' => $path
            ]);
        }

        return Redirect::route('users.index')->with('success', 'New user has been successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $type_menu = 'Users';
        return view('pages.users.users-edit', compact('type_menu', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $image = $request->file('file');

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'max:20',
            'roles' => 'required|max:255',
            'address' => 'max:255',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'role' => $request->roles,
            'address' => trim($request->address),
        ]);

        if ($image) {

            $path = time() . '.' . $image->getClientOriginalExtension();
            $image->move('img/avatar', $path);

            if ($user->image) {
                $oldImagePath = 'img/avatar/' . $user->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $user->update([
                'foto' => $path
            ]);
        }

        return Redirect::route('users.index')->with('success', 'User has been successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('users.index')->with('success', 'User has been successfully deleted.');
    }
}

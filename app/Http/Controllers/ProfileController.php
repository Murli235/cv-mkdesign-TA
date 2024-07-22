<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Middleware;

class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = 'Profile';
        return view('pages.profile.profile-index', compact('type_menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type_menu = 'Profile';
        return view('pages.profile.profile-edit', compact('type_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $profile)
    {
        $image = $request->file('file');

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'max:20',
            'address' => 'max:255',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profile->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => trim($request->address),
        ]);

        if ($image) {

            $path = time() . '.' . $image->getClientOriginalExtension();
            $image->move('img/avatar/', $path);

            if ($profile->image) {
                $oldImagePath = 'img/avatar/' . $profile->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $profile->update([
                'foto' => $path
            ]);
        }

        return Redirect::route('profile.index')->with('success', 'Profile has been successfully edited.');
    }
}

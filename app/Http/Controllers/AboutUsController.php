<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about_us = AboutUs::all()->first();
        $type_menu = 'About-Us';
        return view('pages.about-us.about-us-index', compact('type_menu', 'about_us'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutUs $about_u)
    {
        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'instagram' => 'required',
            'maps' => 'required',
            'description' => 'required'
        ]);

        $about_u->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'instagram_link' => $request->instagram,
            'maps_link' => $request->maps,
            'description' => $request->description
        ]);

        return Redirect::route('about-us.index')->with('success', 'About Us has been successfully edited');
    }
}

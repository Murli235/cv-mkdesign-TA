<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu  = 'Testimoni';
        $keyword    = $request->name;


        if (Auth::user()->role != 'User') {
            $testimonis = Testimoni::when($request->name, function ($query, $name) {
                $query->whereHas('user', function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%');
                });
            })->latest()->paginate(10);
        } else {
            $testimonis = Testimoni::where('user_id', Auth::user()->id)->latest()->paginate(10);
        }

        $testimonis->appends(['name' => $keyword]);
        return view('pages.testimoni.testimoni-index', compact('type_menu', 'testimonis'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();

        return Redirect::route('testimoni.index')->with('success', 'Testimoni has been successfully delete');
    }
}

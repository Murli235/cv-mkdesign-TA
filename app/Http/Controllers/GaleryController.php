<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu  = 'Galeri';
        $keyword    = $request->name;
        $galerys = Galery::with('project')->when($request->name, function ($query, $name) {
            $query->whereHas('project', function ($query) use ($name) {
                $query->where('name', 'like', '%' . $name . '%');
            });
        })->latest()->paginate(10);

        $galerys->appends(['name' => $request->name]);

        return view('pages.galery.galery-index', compact('type_menu', 'galerys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu  = 'Galeri';
        $projects   = Project::all();
        return view('pages.galery.galery-create', compact('type_menu', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'projectId' => 'required',
            'filepond' => 'required',
            'filepond.*' => 'mimes:jpg,jpeg,png,bmp|max:20000'
        ]);


        $files      = $request->file('filepond');
        $paths      = [];

        foreach ($files as $file) {
            $path = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('img/galery/', $path);
            $paths[] = $path;
            Galery::create([
                'project_id' => $request->projectId,
                'image' => $path
            ]);
        }

        return Redirect::route('galery.index')->with('success', 'Image has been successfully uploaded');

        // return response()->json(['paths' => $paths], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galery $galery)
    {
        $galery->delete();
        return Redirect::route('galery.index')->with('success', 'Image has been successfully deleted');
    }
}

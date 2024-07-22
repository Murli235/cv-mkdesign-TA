<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu  = 'Project';
        $keyword    = $request->name;

        $projects = Project::when($request->name, function ($query, $name) {
            $query->where('name', 'like', '%' . $name . '%');
        })->latest()->paginate(10);

        $projects->appends(['name' => $keyword]);

        return view('pages.project.project-index', compact('type_menu', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'Project';
        return view('pages.project.project-create', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'theme' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        Project::create([
            'name' => $request->name,
            'theme' => $request->theme,
            'category' => $request->category,
            'description' => $request->description
        ]);

        return Redirect::route('project.index')->with('success', 'New project has been successfully created.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $type_menu = 'Project';
        return view('pages.project.project-edit', compact('type_menu', 'project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'theme' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        $project->update([
            'name' => $request->name,
            'theme' => $request->theme,
            'category' => $request->category,
            'description' => $request->description
        ]);

        return Redirect::route('project.index')->with('success', 'Project has been successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return Redirect::route('project.index')->with('success', 'Project has been successfully deleted.');
    }
}

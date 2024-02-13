<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //get all types
        $types = Type::all();
        //get all technologies
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //if the request is valid, I can use the validated data
        $data = $request->validated();

        // create a new project with the validated data
        $project = new Project($data);
        //create a slug from the name
        $project->slug = Str::of($project->name)->slug('-');

        // save the project to the database
        $project->save();

        //save the techs with array sync, after the save method
        if (isset($data['technologies'])) {
            $project->technologies()->sync($data['technologies']);
        }

        //redirects to index
        return redirect()->route('admin.projects.index')->with('message', "$project->name project created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $project->slug = Str::of($project->name)->slug('-');
        $project->update($data);

        //redirect to show
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //delete the project from the database
        $project->delete();

        //redirect to index
        return redirect()->route('admin.projects.index')->with('message', "$project->name project deleted successfully!");
    }
}

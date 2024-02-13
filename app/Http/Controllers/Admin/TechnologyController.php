<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //get all technologies
        $technologies = Technology::all();
        return view('admin.technologies.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        //if the request is valid, I can use the validated data
        $data = $request->validated();

        // create a new technology with the validated data
        $technology = new Technology($data);
        //create a slug from the name
        $technology->slug = Str::of($technology->name)->slug('-');

        // save the technology to the database
        $technology->save();

        //redirects to index
        return redirect()->route('admin.technologies.index')->with('message', "$technology->name technology created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        $technologies = Technology::all();
        return view('admin.technologies.edit', compact('technology', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $data = $request->validated();

        // Update the technology with the validated data
        $technology->update($data);

        // Then generate a new slug from the updated name
        $technology->slug = Str::of($technology->name)->slug('-');

        // Save the technology to update the slug in the database
        $technology->save();

        //redirect to show
        return redirect()->route('admin.technologies.show', $technology->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index')->with('message', "$technology->name technology deleted successfully!");
    }
}

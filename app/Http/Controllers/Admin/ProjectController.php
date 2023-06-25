<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facedes\Storage;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $project = Project::all();
        return view('pages.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();

        $slug = Project::generateSlug($request->title);

        $form_data['slug'] = $slug;

        if($request->hasFile('cover_image')){
            $path = Storage::disk('public')->put('post_images', $request->cover_image);
            $form_data['cover_image'] = $path;
        }

        $new_project = new Project();
        $new_project->fill($form_data);
        $new_project->save();

        return redirect()->route('pages.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project){
        return view('pages.show', compact('project'));
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('pages.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->validated();

            $slug = Project::generateSlug($request->title);

            $form_data['slug'] = $slug;

            $project->update($form_data);

            return redirect()->route('pages.index')->with('success', 'modifica avvenuta con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()-> route('pages.index');
    }
}
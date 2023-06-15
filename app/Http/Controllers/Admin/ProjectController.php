<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Auth::user()->projects()->orderBy('date')->paginate(8);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::orderBy('name')->get();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request ->validated();

        $val_data['repo'] = Project::createRepo($val_data['title']);
        $val_data['slug'] = Project::createSlug($val_data['title']);
        $val_data['date'] = date('Y-m-d');
        $val_data['user_id'] = Auth::user()->id;
        if (array_key_exists('Image', $val_data)){
            $Image = Storage::put('uploads', $val_data['Image']);
            $val_data['Image'] = $Image;
        }
        $newproject = Project::create($val_data);
        if ($request['technologies']){
            $newproject->technologies()->attach($val_data['technologies']);
        }
        return to_route('admin.projects.index')->with('message', 'A new project has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {   
        $projects = Project::all();
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)

    {
        $types = Type::all();
        $technologies = Technology::orderBy('name')->get();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)

    {
        $val_data = $request ->validated();
        $val_data['repo'] = Project::createRepo($val_data['title']);
        $val_data['date'] = date('Y-m-d');
        $val_data['slug'] = Project::createSlug($val_data['title']);
        if ($request->hasFile('Image')) {
            if ($project->Image) {
                Storage::delete($project->Image);
            }
            // Save the file in the storage and get its path
            $Image = Storage::put('uploads', $request->Image);
            //dd($image_path);
            $val_data['Image'] = $Image;
        }
        $project->technologies()->sync($val_data['technologies']);
        $project->update($val_data);
        return to_route('admin.projects.index')->with('message', 'The project has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->Image) {
            Storage::delete($project->Image);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'The project has been deleted successfully');
    }
}

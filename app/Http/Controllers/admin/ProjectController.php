<?php

namespace App\Http\Controllers\admin;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view("dashboard.projects.index", ["projects" => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("dashboard.projects.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->image);
        $request->validate([
            "name" => "required",
            "description" => "required",
            // "image" => "required|image|mimes:png,jpg|max:2048",
            "target_donations" => "required",
            "starting_date" => "required",
            "status" => "required",
            "category_id" => "required",
        ]);

        // $imageName = time() . "." . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);
        // $image = base64_encode(file_get_contents($request->file('image')));
        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->image = "jafer.png";
        $project->target_donations = $request->target_donations;
        $project->starting_date = $request->starting_date;
        $project->status = $request->status;
        $project->category_id = $request->category_id;
        $project->save();
        return redirect('/admin/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view("dashboard.projects.edit", ["project" => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            "name" => "required",
            "description" => "required",
            "image" => "required|image|mimes:png,jpg|max:2048",
            "target_donations" => "required",
            "starting_date" => "required",
            "status" => "required"
        ]);

        $image = base64_encode(file_get_contents($request->file('image')));
        $project = Project::find($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->image = $image;
        $project->target_donations = $request->target_donations;
        $project->starting_date = $request->starting_date;
        $project->status = $request->status;
        $project->save();
        return redirect('/admin/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/admin/projects');
    }

    public function trashed()
    {
        $projects = Project::onlyTrashed()->get();
        return view('dashboard.projects.trash', ["projects" => $projects]);
    }

    public function restore($id)
    {
        $project = Project::withTrashed()->find($id);
        $project->restore();
        return redirect('/admin/projects');
    }



    public function project_volunteers($id)
    {
        $project = Project::find($id);
        // dd($project->volunteers);
        return view('dashboard.projects.volunteers', ["project" => $project]);
    }
}

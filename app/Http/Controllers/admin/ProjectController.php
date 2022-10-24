<?php

namespace App\Http\Controllers\admin;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $projects = Project::latest()->filter(request(["search"]))->get();
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
        $request->validate([
            "name" => "required",
            "description" => "required",
            "image" => "required|image|mimes:png,jpg|max:2048",
            "target_donations" => "required",
            "starting_date" => "required",
            "status" => "required",
            "category_id" => "required",
            "requirements" => "required",
        ]);

        // $imageName = time() . "." . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);
        $image = base64_encode(file_get_contents($request->file('image')));
        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->image = $image;
        $project->target_donations = $request->target_donations;
        $project->starting_date = $request->starting_date;
        $project->status = $request->status;
        $project->category_id = $request->category_id;
        $project->requirements = $request->requirements;
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
        return view("dashboard.projects.edit", ["project" => $project, "categories" => Category::all()]);
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
        // dd($request->all());

        $request->validate([
            "name" => "required",
            "description" => "required",
            "image" => "image|mimes:png,jpg|max:2048",
            "target_donations" => "required",
            "starting_date" => "required",
            "status" => "required",
            "category_id" => "required",
            "requirements" => "required",
        ]);

        // $image = base64_encode(file_get_contents($request->file('image')));
        $project = Project::find($id);
        if ($request->image) {
            $image = base64_encode(file_get_contents($request->image));
            $project->image = $image;
        }
        $project->name = $request->name;
        $project->description = $request->description;
        $project->target_donations = $request->target_donations;
        $project->starting_date = $request->starting_date;
        $project->status = $request->status;
        $project->category_id = $request->category_id;
        $project->requirements = $request->requirements;
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
        // $pending_voluntteers = DB::table('project_volunteer')
        //     ->where("status", "pending")
        //     ->where("project_id", $project->id)
        //     ->get();
        return view('dashboard.projects.volunteers', [
            "project" => $project
            // "pending_voluntteers" => $pending_voluntteers
        ]);
    }
}

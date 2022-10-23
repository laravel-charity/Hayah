<?php

namespace App\Http\Controllers\admin;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteers = Volunteer::all();
        return view('dashboard.volunteers.index', compact('volunteers'));
    }

    public function volunteer_projects($id)
    {
        $volunteer = Volunteer::find($id);
        return view('dashboard.volunteers.volunteer_projects', compact('volunteer'));
    }


    public function volunteer_status(Request $request)
    {
        $volunteer_project = DB::table('project_volunteer')->where(function ($query) use ($request) {
            $query->where("project_id", $request->project_id)
                ->where("volunteer_id", $request->volunteer_id);
        })->update(["status" => $request->status]);
        return back();
    }
}

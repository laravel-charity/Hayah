<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;

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


    public function volunteer_status($id)
    {
        $volunteer = Volunteer::find($id);
        $volunteer->status = "approved";
        $volunteer->save();
        return back();
    }
}

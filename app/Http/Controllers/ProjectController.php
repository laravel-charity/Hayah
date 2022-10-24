<?php

namespace App\Http\Controllers;


use App\Models\Project;

use App\Models\Category;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return landing page



        $events = Project::orderBy('id', 'desc')->where('status', 'active')->take(3)->get();

        $in_progress = Project::orderBy('id', 'desc')->where('status', 'in progress')->take(3)->get();

        $accomplished = Project::orderBy('id', 'desc')->where('status', 'accomplished')->take(3)->get();

        // $volunteerId = Project::where('requirements', 'volunteers')->orWhere('requirements', 'both')->get();
        $volunteerId = Category::find(1);   // for caring earth
        $scholarId = Category::find(2); // for scholar category


        return view('projects.index', ['events' => $events, 'in_progress' => $in_progress, 'accomplished' => $accomplished, 'volunteerId' => $volunteerId->id, 'scholarId' => $scholarId->id]);
    }


    // donate page
    public function donate($id)
    {
        $event = project::find($id);
        return view('projects.donate', ['event' => $event]);
    }

    public function donateTo(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $donation = new donation;
        $request->validate([
            'amount' => 'required_without:amount_text',
            'amount_text' => 'required_without:amount',
            'name'     => 'required|regex:/^[a-z ,.\'-]+$/i',
            'email' => 'required|email',
            'project_id' => 'required'
        ]);
        $donation->name = $request->name;
        $donation->email = $request->email;
        $donation->project_id = $request->project_id;

        if ( Auth::user()) {
            $donation->user_id = $user->id;
        }


        if ($request->amount_text == null) {
            $donation->amount = $request->amount;
        } else {
            $donation->amount = $request->amount_text;
        }

        $donation->save();

        return redirect('/')->with('message', 'Thank you for your donation');
    }


    // Show All Projects and Filter Based on Search and Status
    public function showAll()
    {
        return view('projects.projects', [
            'projects' => Project::filter(request(['status', 'search']))->paginate(6),
            'categories' => Category::all()
        ])->with('message', '');
    }

    public function showAllWithMessage()
    {
        return view('projects.projects', [
            'projects' => Project::filter(request(['status', 'search']))->paginate(6),
            'categories' => Category::all(),

        ])->with('message', 'Please choose the project that you would like to make a donation to.');
    }
    // Filter Projects Based on Category
    public function filterByCategory()
    {
        if (@request('filter')) {

            return view('projects.projects', ['projects' => Project::where('category_id', @request('filter'))->filter(request(['status']))->paginate(6), 'categories' => Category::all()]);
        }
    }

    // Show one Project Details
    public function show($id)
    {
        return view('projects.show', ['project' => Project::find($id)]);
    }
}

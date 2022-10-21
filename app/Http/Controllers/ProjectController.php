<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\Request;

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

        return view('projects.index', ['events' => $events, 'in_progress' => $in_progress, 'accomplished' => $accomplished]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // donate page
    public function donate($id)
    {
        $event = project::find($id);
        return view('projects.donate', ['event' => $event]);
    }

    public function donateTo(Request $request)
    {
        $donation = new donation;
        $request->validate([
            'amount' => 'required_without:amount_text',
            'amount_text' => 'required_without:amount',
            'name'     => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'project_id' => 'required'
        ]);
        $donation->name = $request->name;
        $donation->email = $request->email;
        $donation->project_id = $request->project_id;
        $donation->amount = $_POST['amount_text'];
        if (isset($_POST['amount_text'])) {
        } elseif (isset($_POST['amount'])) {
            $donation->amount = $_POST['amount'];
        }
        $donation->save();


        return redirect()->intended('/')->with('message', 'Thank you for your donation');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Volunteer;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    public function statistics()
    {
        $users = User::all();
        // dd($users);
        $donations = Donation::all();
        $projects = Project::all();
        $volunteers = Volunteer::all();
        $contacts = Contact::all();
        $newsLetters = Newsletter::all();
        $categories = Category::all();

        $projectsView = $projects->sortBy('starting_date')->take(3);
        $projectsView->values()->all();

        $donationsView = Donation::latest()->limit(3)->get();

        // dd($donationsView);
        return view('admin', [
            'users'          => $users,
            'donations'      => $donations,
            'projects'       => $projects,
            'volunteers'     => $volunteers,
            'contacts'       => $contacts,
            'newsletter'     => $newsLetters,
            'category'       => $categories,
            'projectsView'   => $projectsView,
            'donationsView'  => $donationsView,
        ]);
    }
}

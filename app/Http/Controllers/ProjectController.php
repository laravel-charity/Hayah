<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Show All Projects and Filter Based on Search and Status
    public function showAll()
    {
        return view('projects.projects', ['projects' => Project::filter(request(['status', 'search']))->paginate(6), 'categories' => Category::all()]);
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

<?php

namespace App\Http\Controllers\admin;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::latest()->project(request(["search"]))->get();
        return view('dashboard.donations.index', compact("donations"));
    }
}

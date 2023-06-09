<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index ()
    {
        $projects = Auth::user()->projects()->orderByDesc('id')->get();
        $totalProjects = count($projects);
        $firstProject = $projects[$totalProjects - 1];
        $lastProject = $projects[0];
        return view ('admin.dashboard', compact('totalProjects', 'firstProject', 'lastProject'));
    }
}

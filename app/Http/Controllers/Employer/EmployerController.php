<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    //

    public function dashboard()
    {
        return view('employer.dashboard');
    }

    public function jobpost()
    {
        return view('employer.jobpost');
    }
}

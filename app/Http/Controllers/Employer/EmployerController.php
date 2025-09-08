<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\MyJob;
use Illuminate\Support\Facades\DB;
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
        $job_categories = DB::table('job_categories')->get();
        return view('employer.jobpost', compact('job_categories'));
    }

    public function jobstore(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_category' => 'required|exists:job_categories,id',
            'job_type' => 'required|string',
            'work_setup' => 'required|string',
            'location' => 'nullable|string',
            'vacancies' => 'required|integer|min:1',
            'job_description' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'required_skills' => 'nullable|string',
            'preferred_skills' => 'nullable|string',
            'experience_level' => 'required|string',
            'salary_range' => 'nullable|string',
            'currency' => 'nullable|string',
            'payment_schedule' => 'nullable|string',
            'benefits' => 'nullable|string',
            'application_deadline' => 'nullable|date',
            'apply_method' => 'nullable|string',
        ]);

        MyJob::create($validated);

        return redirect()->back()->with('success', 'Job created successfully!');
    }
    

    
}

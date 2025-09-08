<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\MyJob;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    // Store job
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_category' => 'required|exists:job_categories,id',
        ]);

        MyJob::create([
            'job_title' => $request->job_title,
            'job_category_id' => $request->job_category,
            'job_type' => $request->job_type,
            'work_setup' => $request->work_setup,
            'location' => $request->location,
            'vacancies' => $request->vacancies,
            'job_description' => $request->job_description,
            'responsibilities' => $request->responsibilities,
            'required_skills' => $request->required_skills,
            'preferred_skills' => $request->preferred_skills,
            'experience_level' => $request->experience_level,
            'salary_range' => $request->salary_range,
            'currency' => $request->currency,
            'payment_schedule' => $request->payment_schedule,
            'benefits' => $request->benefits,
            'application_deadline' => $request->application_deadline,
            'apply_method' => $request->apply_method,
        ]);

        return redirect()->back()->with('success', 'Job created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

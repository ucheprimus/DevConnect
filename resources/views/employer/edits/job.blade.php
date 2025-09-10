@extends('layouts.dashboard')

@section('content')
    <!-- Create Button -->
    <!-- Trigger Button -->
    <div class="d-flex justify-content-end mb-4" >

        <a href="{{route('jobpost')}}"
            class="btn btn-sm btn-warning d-flex align-items-center gap-1">
            <i class="bi bi-pencil"></i> Go Back
        </a>
    </div>


    <div class="row" style="background-color: white">

        <div class="col-md-12">
            <form id="jobForm" method="post" action="{{ route('jobs.update', $job->id) }}">
                @csrf
                @method('PUT')
            
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            
                <div class="modal-body" style="max-height:70vh; overflow-y:auto;">
                    <!-- Basic Job Details -->
                    <h6 class="fw-bold">Basic Details</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Job Title</label>
                            <input type="text" class="form-control" name="job_title"
                                   value="{{ old('job_title', $job->job_title) }}" required>
                        </div>
            
                        <div class="col-md-6 mb-3">
                            <select class="form-select" name="job_category_id" required>
                                <option value="">-- Select Job Category --</option>
                                @foreach ($job_categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('job_category_id', $job->job_category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Job Type</label>
                            <select class="form-select" name="job_type">
                                @foreach (['Full-time','Part-time','Contract','Internship','Freelance'] as $type)
                                    <option value="{{ $type }}" 
                                        {{ old('job_type', $job->job_type) == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Work Setup</label>
                            <select class="form-select" name="work_setup">
                                @foreach (['On-site','Remote','Hybrid'] as $setup)
                                    <option value="{{ $setup }}" 
                                        {{ old('work_setup', $job->work_setup) == $setup ? 'selected' : '' }}>
                                        {{ $setup }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Job Location</label>
                            <input type="text" class="form-control" name="location"
                                   value="{{ old('location', $job->location) }}">
                        </div>
            
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Number of Vacancies</label>
                            <input type="number" class="form-control" name="vacancies" min="1"
                                   value="{{ old('vacancies', $job->vacancies) }}">
                        </div>
                    </div>
            
                    <!-- Job Description & Requirements -->
                    <h6 class="fw-bold mt-4">Job Description & Requirements</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Job Description</label>
                            <textarea class="form-control" name="job_description" rows="1">{{ old('job_description', $job->job_description) }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Responsibilities</label>
                            <textarea class="form-control" name="responsibilities" rows="1">{{ old('responsibilities', $job->responsibilities) }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Required Skills</label>
                            <textarea class="form-control" name="required_skills" rows="1">{{ old('required_skills', $job->required_skills) }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Preferred Skills</label>
                            <textarea class="form-control" name="preferred_skills" rows="1">{{ old('preferred_skills', $job->preferred_skills) }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Experience Level</label>
                            <select class="form-select" name="experience_level">
                                @foreach (['Entry','Mid','Senior','Executive'] as $level)
                                    <option value="{{ $level }}" 
                                        {{ old('experience_level', $job->experience_level) == $level ? 'selected' : '' }}>
                                        {{ $level }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            
                    <!-- Compensation & Benefits -->
                    <h6 class="fw-bold mt-4">Compensation & Benefits</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Salary Range</label>
                            <input type="text" class="form-control" name="salary_range"
                                   value="{{ old('salary_range', $job->salary_range) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Currency</label>
                            <input type="text" class="form-control" name="currency"
                                   value="{{ old('currency', $job->currency) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Payment Schedule</label>
                            <select class="form-select" name="payment_schedule">
                                @foreach (['Monthly','Hourly','Annually','Negotiable'] as $schedule)
                                    <option value="{{ $schedule }}" 
                                        {{ old('payment_schedule', $job->payment_schedule) == $schedule ? 'selected' : '' }}>
                                        {{ $schedule }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Other Benefits</label>
                            <textarea class="form-control" name="benefits" rows="1">{{ old('benefits', $job->benefits) }}</textarea>
                        </div>
                    </div>
            
                    <!-- Application & Hiring -->
                    <h6 class="fw-bold mt-4">Application & Hiring</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Application Deadline</label>
                            <input type="date" class="form-control" name="application_deadline"
                                   value="{{ old('application_deadline', $job->application_deadline) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">How to Apply</label>
                            <input type="text" class="form-control" name="apply_method"
                                   value="{{ old('apply_method', $job->apply_method) }}">
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Job</button>
                </div>
            </form>
            

        </div>

    </div>

@endsection

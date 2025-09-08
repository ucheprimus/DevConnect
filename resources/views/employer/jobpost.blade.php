@extends('layouts.dashboard')

@section('content')
    <!-- Create Button -->
    <!-- Trigger Button -->
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Create
        </button>
    </div>






    <div class="row">

        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                </ol>
            </nav>

            <div class="ms-panel">
                <div class="ms-panel-header">
                    <h6>Hoverable Rows Datatable</h6>
                </div>
                <div class="ms-panel-body">
                    <div class="table-responsive">
                        <table id="data-table-1" class="table table-hover w-100">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john.doe@example.com</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jane</td>
                                    <td>Smith</td>
                                    <td>jane.smith@example.com</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Michael</td>
                                    <td>Brown</td>
                                    <td>michael.brown@example.com</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


        </div>

    </div>




    <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <form id="jobForm" method="post" action="{{route('jobstore')}}">
            @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Post a Job</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body" style="max-height:70vh; overflow-y:auto;">
            <!-- Basic Job Details -->
                        <h6 class="fw-bold">Basic Details</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Job Title</label>
                                <input type="text" class="form-control" name="job_title" required>
                            </div>


                            <div class="col-md-6 mb-3">

                            <select class="form-select" name="job_category" required>
                                <option value="">-- Select Job Category --</option>
                                @foreach ($job_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            </div>
                            

                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Job Type</label>
                                <select class="form-select" name="job_type">
                                    <option>Full-time</option>
                                    <option>Part-time</option>
                                    <option>Contract</option>
                                    <option>Internship</option>
                                    <option>Freelance</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Work Setup</label>
                                <select class="form-select" name="work_setup">
                                    <option>On-site</option>
                                    <option>Remote</option>
                                    <option>Hybrid</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Job Location</label>
                                <input type="text" class="form-control" name="location">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Number of Vacancies</label>
                                <input type="number" class="form-control" name="vacancies" min="1">
                            </div>
                        </div>

                        <!-- Job Description & Requirements -->
                        <h6 class="fw-bold mt-4">Job Description & Requirements</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Job Description</label>
                                <textarea class="form-control" name="job_description" rows="1"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Responsibilities</label>
                                <textarea class="form-control" name="responsibilities" rows="1"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Required Qualifications / Skills</label>
                                <textarea class="form-control" name="required_skills" rows="1"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Preferred Qualifications (Optional)</label>
                                <textarea class="form-control" name="preferred_skills" rows="1"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Experience Level</label>
                                <select class="form-select" name="experience_level">
                                    <option>Entry</option>
                                    <option>Mid</option>
                                    <option>Senior</option>
                                    <option>Executive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Compensation & Benefits -->
                        <h6 class="fw-bold mt-4">Compensation & Benefits</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Salary Range</label>
                                <input type="text" class="form-control" name="salary_range"
                                    placeholder="e.g., $50,000 - $70,000">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Currency</label>
                                <input type="text" class="form-control" name="currency" placeholder="USD, EUR, etc.">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Payment Schedule</label>
                                <select class="form-select" name="payment_schedule">
                                    <option>Monthly</option>
                                    <option>Hourly</option>
                                    <option>Annually</option>
                                    <option>Negotiable</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Other Benefits</label>
                                <textarea class="form-control" name="benefits" rows="1"></textarea>
                            </div>
                        </div>

                        <!-- Application & Hiring -->
                        <h6 class="fw-bold mt-4">Application & Hiring</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Application Deadline</label>
                                <input type="date" class="form-control" name="application_deadline">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">How to Apply</label>
                                <input type="text" class="form-control" name="apply_method"
                                    placeholder="Via platform / email / link">
                            </div>

                        </div>

                        <!-- Company Information -->
                        {{-- <h6 class="fw-bold mt-4">Company Information</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="company_name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Logo</label>
                                <input type="file" class="form-control" name="company_logo">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Website</label>
                                <input type="url" class="form-control" name="company_website">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Description</label>
                                <textarea class="form-control" name="company_description" rows="1"></textarea>
                            </div>
                        </div> --}}

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

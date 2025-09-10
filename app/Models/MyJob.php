<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyJob extends Model
{
    //
    protected $fillable = [
        'job_title',
        'job_category_id',
        'job_type',
        'work_setup',
        'location',
        'vacancies',
        'job_description',
        'responsibilities',
        'required_skills',
        'preferred_skills',
        'experience_level',
        'salary_range',
        'currency',
        'payment_schedule',
        'benefits',
        'application_deadline',
        'apply_method',
    ];

    public function category()
{
    return $this->belongsTo(JobCategory::class, 'job_category_id');
}

}

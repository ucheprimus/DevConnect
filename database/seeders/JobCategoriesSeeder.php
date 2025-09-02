<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Accounting & Finance',
            'Administrative & Office Support',
            'Advertising & Marketing',
            'Architecture & Engineering',
            'Arts & Design',
            'Business Development',
            'Community & Social Services',
            'Construction & Skilled Trades',
            'Consulting',
            'Customer Service',
            'Data & Analytics',
            'Education & Training',
            'Healthcare',
            'Hospitality & Tourism',
            'Human Resources',
            'Information Technology',
            'Legal',
            'Management',
            'Manufacturing & Production',
            'Media & Communications',
            'Operations',
            'Product Management',
            'Project Management',
            'Quality Assurance',
            'Real Estate',
            'Research & Science',
            'Retail',
            'Sales',
            'Security & Public Safety',
            'Software Development',
            'Supply Chain & Logistics',
            'Writing & Editing',
            'Other',
        ];

        foreach ($categories as $category) {
            DB::table('job_categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    //

    public function jobs()
{
    return $this->hasMany(MyJob::class, 'job_category_id');
}

}

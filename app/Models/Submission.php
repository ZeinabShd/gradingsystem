<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['enrollment_id','score','grade_label','is_pass','date_submitted'];
    public function enrollment()
{
    return $this->belongsTo(Enrollment::class);
}
}

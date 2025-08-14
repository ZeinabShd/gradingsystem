<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollmentNotes extends Model
{
   public function enrollment()
{
    return $this->belongsTo(Enrollment::class);
}
}

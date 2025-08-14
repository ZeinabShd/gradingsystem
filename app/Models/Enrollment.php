<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
protected $table = 'enrollment';
protected $fillable = [
    'student_id',
    'subject_id',
    'progress',
    'notes',
    'date_success'
];
public function student()
{
    return $this->belongsTo(Student::class);
}

public function subject()
{
    return $this->belongsTo(Subject::class);
}

public function submissions()
{
    return $this->hasMany(Submission::class);
}

public function progressHistory()
{
    return $this->hasMany(ProgressHistory::class);
}

public function notes()
{
    return $this->hasMany(EnrollmentNotes::class);
}
}

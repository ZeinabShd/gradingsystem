<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
 public function enrollment()
{
    return $this->hasMany(Enrollment::class);
}
}

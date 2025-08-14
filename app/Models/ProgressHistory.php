<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressHistory extends Model
{
  public function enrollment()
{
    return $this->belongsTo(Enrollment::class);
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressPerClass extends Model
{
  use HasFactory;
  protected $guarded = ['id'];
  protected $table = 'progress_per_class';
}

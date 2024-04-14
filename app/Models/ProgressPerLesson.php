<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressPerLesson extends Model
{
  use HasFactory;
  protected $guarded = ['id'];
  protected $table = 'progress_per_lesson';

  public function user()
  {
    return $this->belongsTo(User::class, 'id_user');
  }

  public function lesson()
  {
    return $this->belongsTo(Lesson::class, 'id_lesson');
  }
}

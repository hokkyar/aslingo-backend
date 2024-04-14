<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  use HasFactory;
  protected $table = 'materials';
  protected $guarded = ['id'];

  protected $hidden = [
    'created_at',
    'updated_at',
  ];

  public function lesson()
  {
    return $this->belongsTo(Lesson::class, 'id_lesson');
  }
}

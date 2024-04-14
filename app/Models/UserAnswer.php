<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
  use HasFactory;
  protected $table = 'user_answer';
  protected $guarded = ['id'];

  public function user()
  {
    return $this->belongsTo(User::class, 'id_user');
  }

  public function quiz()
  {
    return $this->belongsTo(Quiz::class, 'id_quiz');
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizScore extends Model
{
  use HasFactory;
  protected $table = 'user_quiz_scores';
  protected $guarded = ['id'];
}

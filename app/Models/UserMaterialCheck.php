<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMaterialCheck extends Model
{
  use HasFactory;
  protected $table = 'user_material_checks';
  protected $guarded = ['id'];
  // protected $hidden = ['created_at', 'updated_at'];

  public function user()
  {
    return $this->belongsTo(User::class, 'id_user');
  }

  public function material()
  {
    return $this->belongsTo(Material::class, 'id_material');
  }
}

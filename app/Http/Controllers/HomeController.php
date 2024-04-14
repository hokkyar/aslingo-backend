<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\ProgressPerClass;
use App\Models\UserMaterialCheck;

class HomeController extends Controller
{
  public function index()
  {
    $id_user = auth('api')->user()->id;

    $data = ProgressPerClass::where('id_user', $id_user)->get(['class', 'progress']);

    $data = $data->map(function ($item) {
      switch ($item['class']) {
        case '7':
          $item['lesson_sum'] = Lesson::where('class', '7')->count();
          break;
        case '8':
          $item['lesson_sum'] = Lesson::where('class', '8')->count();
          break;
        case '9':
          $item['lesson_sum'] = Lesson::where('class', '9')->count();
          break;
      }
      return $item;
    });

    $latest_check = UserMaterialCheck::where('id_user', $id_user)->where('is_done', true)->latest('updated_at')->first();

    return response([
      'data' => $data,
      'recent_activity' => $latest_check->material
    ]);
  }
}

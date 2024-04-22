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

    $latest_check = UserMaterialCheck::where('id_user', $id_user)
      ->where('is_done', true)
      ->latest('updated_at')
      ->first();

    if ($latest_check) {
      $latest_check->material->cover = $latest_check->material->cover ? env('APP_HOST_NAME') . '/storage/images/' . $latest_check->material->cover : null;
      $latest_check->material->head_pic = $latest_check->material->head_pic ?  env('APP_HOST_NAME') . '/storage/images/' . $latest_check->material->head_pic : null;
      $latest_check->material->ilustration = $latest_check->material->ilustration ?  env('APP_HOST_NAME') . '/storage/images/' . $latest_check->material->ilustration : null;
      $latest_check->material->video = $latest_check->material->video ?  env('APP_HOST_NAME') . '/storage/videos/' . $latest_check->material->video : null;
    }

    return response([
      'data' => $data,
      'recent_activity' => $latest_check->material ?? null
    ]);
  }
}

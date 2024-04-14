<?php

namespace App\Http\Controllers;

use App\Models\ProgressPerClass;
use App\Models\ProgressPerLesson;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    return Inertia::render('Manage/User/Index');
  }

  public function create()
  {
    return Inertia::render('Manage/User/Create');
  }

  public function detail(string $id)
  {
    $class_progress = ProgressPerClass::where('id_user', '=', $id)->get();
    $lesson_progress = ProgressPerLesson::where('id_user', '=', $id)->with('lesson')->get();
    $user = User::find($id);
    return Inertia::render('Manage/User/Detail', [
      'user' => $user,
      'class_progress' => $class_progress,
      'lesson_progress' => $lesson_progress
    ]);
  }

  public function store(Request $request)
  {
    User::create($request->validate([
      'name' => ['required'],
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]));
    return to_route('manage.user.index');
  }

  // DATATABLES
  public function get_user(Request $request)
  {
    if ($request->ajax()) {
      $users = User::where('role', '!=', 'admin')->get();
      return datatables()->of($users)->make(true);
    }
  }

  public function update_user(Request $request, string $id)
  {
    $user = User::find($id);
    $user->name = $request->name;
    $user->save();
    return response([
      'updated_id' => $id
    ]);
  }

  public function delete_user(Request $request, string $id)
  {
    User::destroy($id);
    return response([
      'deleted_id' => $id
    ]);
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  /**
   * Create a new AuthController instance.
   *
   * @return void
   */
  // public function __construct()
  // {
  //   $this->middleware('auth:api', ['except' => ['login']]);
  // }

  /**
   * Get a JWT via given credentials.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function login()
  {
    $credentials = request(['email', 'password']);
    if (!$token = auth('api')->attempt($credentials)) {
      return response()->json([
        'error' => 'bad_request',
        'message' => 'Email atau password salah',
      ], 401);
    }

    $user = User::where('email', request('email'))->first();
    return response([
      'success' => 'user_login',
      'auth' => $this->respondWithToken($token)->original,
      'user' => $user
    ]);
  }

  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|string|min:8',
      'confirm_password' => 'required|string|same:password|min:8',
    ]);

    if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()], 400);
    }

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => $request->password,
    ]);

    return response([
      'success' => 'user_registered',
      'message' => 'User successfully registered'
    ]);
  }

  /**
   * Get the authenticated User.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function me()
  {
    return response()->json(auth('api')->user());
  }

  /**
   * Log the user out (Invalidate the token).
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function logout()
  {
    auth('api')->invalidate(true);
    // auth('api')->logout();
    return response()->json([
      'success' => 'user_logout',
      'message' => 'Successfully logged out'
    ]);
  }

  /**
   * Refresh a token.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function refresh()
  {
    return $this->respondWithToken(auth('api')->refresh());
  }

  /**
   * Get the token array structure.
   *
   * @param  string $token
   *
   * @return \Illuminate\Http\JsonResponse
   */
  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => 'lifetime'
      // 'expires_in' => auth('api')->factory()->getTTL() * 60
    ]);
  }
}

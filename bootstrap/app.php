<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    api: __DIR__ . '/../routes/api.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
  )
  ->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
      \App\Http\Middleware\HandleInertiaRequests::class,
      \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
    ]);

    $middleware->alias([
      'is_admin' => \App\Http\Middleware\IsAdmin::class,
      'is_student' => \App\Http\Middleware\IsStudent::class,
    ]);
  })
  ->withExceptions(function (Exceptions $exceptions) {
    $exceptions->renderable(function (NotFoundHttpException $e) {
      if ($e instanceof NotFoundHttpException) {
        return response()->json([
          'error' => 'api_not_found',
          'message' => 'Not Found'
        ], 404);
      } else {
        return response([
          'error' => 'server_error',
          'message' => 'Internal Server Error'
        ], 500);
      }
    });
  })->create();

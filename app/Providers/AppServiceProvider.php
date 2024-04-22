<?php

namespace App\Providers;

use App\Models\Lesson;
use App\Models\Material;
use App\Models\User;
use App\Models\UserMaterialCheck;
use App\Observers\UserObserver;
use App\Observers\LessonObserver;
use App\Observers\MaterialObserver;
use App\Observers\UserMaterialCheckObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    User::observe(UserObserver::class);
    Lesson::observe(LessonObserver::class);
    Material::observe(MaterialObserver::class);
  }
}

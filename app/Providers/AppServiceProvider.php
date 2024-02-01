<?php

namespace App\Providers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        View::composer('layout', function ($view) {
            $user = Auth::user();
            $totalTasks = Task::where('user_id', $user->id)->count();
            $view->with('totalTasks', $totalTasks);
        });
    }
}

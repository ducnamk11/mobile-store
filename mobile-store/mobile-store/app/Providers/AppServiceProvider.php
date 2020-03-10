<?php

namespace App\Providers;

use App\Models\CategoryModel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['category'] = CategoryModel::orderBy('cate_id', 'desc')->take(8)->get();
        view()->share($data);
    }
}

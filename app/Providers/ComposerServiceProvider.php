<?php

namespace App\Providers;

use DB;
use Illuminate\Support\ServiceProvider;
use Newsletter;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('*', function ($view) {
            $Newsletter = Newsletter::getMembers()['total_items'];
            $user_count = DB::table('users')->count();
            $have = DB::table('have_videos')->count();
            $search = DB::table('search_videos')->count();
            $h_s_c = $have + $search;
            $view->with(['Newsletter' => $Newsletter, 'user_count' => $user_count, 'h_s_c' => $h_s_c]);
        });
    }
}

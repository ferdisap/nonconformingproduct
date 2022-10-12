<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;

use App\View\Components\User\Dashboard\Users\Unmpwd;
use App\View\Components\User\Dashboard\Users\Profile;
use App\View\Components\User\Dashboard\Dpls\Index;
use App\View\Components\User\Dashboard\Dpls\Chart;
use App\View\Components\User\Dashboard\Dpls\Create;
use App\View\Components\User\Dashboard\Dpls\Table;
use App\View\Components\User\Dashboard\Dpls\Show;

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
      Paginator::defaultView('pagination.default');

      Blade::component('components-user-dashboard-users-profile', Profile::class);
      Blade::component('components-user-dashboard-users-unmpwd', Unmpwd::class);

      Blade::component('components-user-dashboard-dpls-index', Index::class);
      Blade::component('components-user-dashboard-dpls-chart', Chart::class);
      Blade::component('components-user-dashboard-dpls-table', Table::class);
      Blade::component('components-user-dashboard-dpls-create', Create::class);
      Blade::component('components-user-dashboard-dpls-show', Show::class);

      // Blade::componentNamespace('Views\\Components\\Dashboard\\User', 'views');
      // Blade::componentNamespace('Views\\Components\\Dashboard\\User', 'dpls');
    }
}

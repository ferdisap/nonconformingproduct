<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;

use App\View\Components\User\Dashboard\Settings\Unmpwd;
use App\View\Components\User\Dashboard\Settings\Profile;
use App\View\Components\User\Dashboard\Dpls\Index;
use App\View\Components\User\Dashboard\Dpls\Chart;
use App\View\Components\User\Dashboard\Dpls\Create;
use App\View\Components\User\Dashboard\Dpls\Table;

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

      Blade::component('components-user-dashboard-settings-profile', Profile::class);
      Blade::component('components-user-dashboard-settings-unmpwd', Unmpwd::class);

      Blade::component('components-user-dashboard-dpls-index', Index::class);
      Blade::component('components-user-dashboard-dpls-chart', Chart::class);
      Blade::component('components-user-dashboard-dpls-table', Table::class);
      Blade::component('components-user-dashboard-dpls-create', Create::class);

      // Blade::componentNamespace('Views\\Components\\Dashboard\\User', 'views');
      // Blade::componentNamespace('Views\\Components\\Dashboard\\User', 'dpls');
    }
}

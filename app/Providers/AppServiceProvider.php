<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Dashboard\User\Settings\Profile;
use App\View\Components\Dashboard\User\Settings\Unmpwd;
use App\View\Components\Dashboard\User\Dpls\Index;
use App\View\Components\Dashboard\User\Dpls\Chart;
use App\View\Components\Dashboard\User\Dpls\Create;
use App\View\Components\Dashboard\User\Dpls\Table;

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
      // this is no code while you are using livewire component 
      // Paginator::useBootstrapFive();
      Paginator::defaultView('pagination.default');
      // Paginator::defaultView('vendor.pagination.semantic-ui');
      Blade::component('components-dashboard-user-settings-profile', Profile::class);
      Blade::component('components-dashboard-user-settings-unmpwd', Unmpwd::class);
      Blade::component('components-dashboard-user-dpls-index', Index::class);
      Blade::component('components-dashboard-user-dpls-chart', Chart::class);
      Blade::component('components-dashboard-user-dpls-table', Table::class);
      Blade::component('components-dashboard-user-dpls-create', Create::class);
      // Blade::componentNamespace('Views\\Components\\Dashboard\\User', 'views');
      // Blade::componentNamespace('Views\\Components\\Dashboard\\User', 'dpls');
    }
}

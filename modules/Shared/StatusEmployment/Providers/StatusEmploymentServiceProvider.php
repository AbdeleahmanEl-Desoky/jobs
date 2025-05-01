<?php

declare(strict_types=1);

namespace Modules\Shared\StatusEmployment\Providers;

use Illuminate\Support\Facades\Route;
use BasePackage\Shared\Module\ModuleServiceProvider;

class StatusEmploymentServiceProvider extends ModuleServiceProvider
{
    public static function getModuleName(): string
    {
        return 'StatusEmployment';
    }

    public function boot(): void
    {
        $this->registerTranslations();
        //$this->registerConfig();
        $this->registerMigrations();
    }

    public function register(): void
    {
        $this->registerRoutes();
    }

    public function mapRoutes(): void
    {
        Route::prefix('api/v1/status_employments')
            ->middleware('api')
            ->group($this->getModulePath() . '/Resources/routes/api.php');

    }
}

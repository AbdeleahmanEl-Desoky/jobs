<?php

declare(strict_types=1);

namespace Modules\CoreUser\ApplyJob\Providers;

use Illuminate\Support\Facades\Route;
use BasePackage\Shared\Module\ModuleServiceProvider;

class ApplyJobServiceProvider extends ModuleServiceProvider
{
    public static function getModuleName(): string
    {
        return 'ApplyJob';
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
        Route::prefix('api/v1/users/apply_jobs')
            ->middleware('api')
            ->group($this->getModulePath() . '/Resources/routes/api.php');

    }
}

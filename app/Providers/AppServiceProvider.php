<?php

namespace App\Providers;

use App\Services\Internal\URL\Generator\GeneratorContract;
use App\Services\Internal\URL\Generator\HashShortCodeGenerator;
use App\Services\Internal\URL\ShortURLService;
use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->when(ShortURLService::class)
            ->needs(GeneratorContract::class)
            ->give(HashShortCodeGenerator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

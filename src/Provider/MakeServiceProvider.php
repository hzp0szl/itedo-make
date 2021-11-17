<?php

namespace ItedoMake\Provider;

use Illuminate\Support\ServiceProvider;
use ItedoMake\Console\Commands\Make;

class MakeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            Make\AutoMake::class,
            Make\MakeClear::class,
            Make\MakeController::class,
            Make\MakeModel::class,
            Make\MakeRequest::class,
            Make\MakeResource::class,
            Make\MakeUpdateRequest::class,
        ]);
    }
}

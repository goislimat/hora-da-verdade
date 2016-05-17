<?php

namespace Verdade\Providers;

use Illuminate\Support\ServiceProvider;

class VerdadeRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \Verdade\Repositories\UserRepository::class,
            \Verdade\Repositories\UserRepositoryEloquent::class
        );

        $this->app->bind(
            \Verdade\Repositories\CursoRepository::class,
            \Verdade\Repositories\CursoRepositoryEloquent::class
        );

        $this->app->bind(
            \Verdade\Repositories\DisciplinaRepository::class,
            \Verdade\Repositories\DisciplinaRepositoryEloquent::class
        );

        $this->app->bind(
            \Verdade\Repositories\ProvaRepository::class,
            \Verdade\Repositories\ProvaRepositoryEloquent::class
        );
    }
}

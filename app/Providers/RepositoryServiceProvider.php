<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\TesRepository::class, \App\Repositories\TesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SmsapiRepository::class, \App\Repositories\SmsapiRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\HotelRepository::class, \App\Repositories\HotelRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\WisataRepository::class, \App\Repositories\WisataRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\KulinerRepository::class, \App\Repositories\KulinerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GaleryRepository::class, \App\Repositories\GaleryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FasilitasRepository::class, \App\Repositories\FasilitasRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VisitRepository::class, \App\Repositories\VisitRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EventRepository::class, \App\Repositories\EventRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ItemRepository::class, \App\Repositories\ItemRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ContactRepository::class, \App\Repositories\ContactRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CommentRepository::class, \App\Repositories\CommentRepositoryEloquent::class);
        //:end-bindings:
    }
}

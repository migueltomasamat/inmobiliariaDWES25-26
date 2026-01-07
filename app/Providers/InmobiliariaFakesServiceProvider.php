<?php

namespace App\Providers;

use App\Faker\InmobiliariaFakesProvider;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class InmobiliariaFakesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Generator::class,function(){
            $faker= Factory::create(env('APP_FAKER_LOCALE'));
            $faker->addProvider(new InmobiliariaFakesProvider($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

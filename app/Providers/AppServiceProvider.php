<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //#_estudiantes_1: Importamos una clase que contiene funcionalidades que vamos a necesitar


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
        //#_Estudiantes_2  Este metodo nos ayuda a hacer migraciones a la BD que tendran una longitud defoult de 191
        Schema::defaultStringLength(191);
    }
}

<?php

namespace Ajtarragona\TComponents;

use Ajtarragona\TComponents\Commands\PublishAssets;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Ajtarragona\TComponents\DirectivesRepository;
use Livewire\Livewire;
use Ajtarragona\TComponents\Livewire\Docs;
use Ajtarragona\TComponents\Livewire\SrcViewer;
use Ajtarragona\TComponents\Livewire\Test;


class TComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
     

        //cargo rutas
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        

        //vistas   
        $this->loadViewsFrom(__DIR__.'/resources/views', 't-components');
        
        //idiomas
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 't-components');

        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang/vendor/t-components'),
        ], 't-components-translations');

        //publico vistas
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/resources/views' => $this->app->resourcePath('views/vendor/ajtarragona/t-components'),
            ], 't-components-views');
        }



        //publico configuracion
        $config = __DIR__.'/Config/t-components.php';
        
        $this->publishes([
            $config => config_path('t-components.php'),
        ], 't-components-config');


        //publico assets
        $this->publishes([
            dirname(__DIR__).'/public' => public_path('vendor/ajtarragona'),
        ], 't-components-assets');

        $this->mergeConfigFrom($config, 't-components');


        $this->registerDirectives();

        $this->registerComponents();
        
        $this->registerCommands();
        $this->registerLivewireComponents();

    }

     /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
      

        //defino facades
        // $this->app->bind('webcomponent', function(){
        //     return new \Ajtarragona\WebComponents\Models\WebComponent;
        // });
        
        // $this->app->bind('icon', function(){
        //     return new \Ajtarragona\WebComponents\Models\Icon;
        // });


        //helpers
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename){
            require_once($filename);
        }
    }


    public function registerDirectives()
    {
        $directives = require __DIR__.'/directives.php';
        // dd($directives);
        DirectivesRepository::register($directives);

    } 


    public function registerLivewireComponents(){
        Livewire::component('t-components-docs', Docs::class);
        Livewire::component('t-components-test-form', Test::class);



    }
    
    public function registerComponents()
    {
        
        $components = require __DIR__.'/components.php';
        DirectivesRepository::registerComponents($components);
    }

    public function registerCommands()
    {
        
        if ($this->app->runningInConsole()) {
            $this->commands([
                PublishAssets::class
            ]);
        }
    }
}

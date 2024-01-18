<?php

namespace Ajtarragona\TComponents;

use Ajtarragona\TComponents\Commands\PublishAssets;
use Ajtarragona\TComponents\Components\Modal\Modals;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Ajtarragona\TComponents\DirectivesRepository;
use Livewire\Livewire;
use Ajtarragona\TComponents\Livewire\Docs;
use Ajtarragona\TComponents\Livewire\SrcViewer;
use Ajtarragona\TComponents\Livewire\TestForm;
use Ajtarragona\TComponents\Test\TestModal;
use Ajtarragona\TComponents\Test\TestModal2;

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
        // $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'tgn');

        // $this->publishes([
        //     __DIR__.'/resources/lang' => resource_path('lang/vendor/t-components'),
        // ], 't-components-translations');

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
        Livewire::component('t-components-test-modal', TestModal::class);
        Livewire::component('t-components-test-modal-2', TestModal2::class);
        Livewire::component('t-components-test-form', TestForm::class);
        
        /** the reusable components */
        Livewire::component('t-modals-container', Modals::class);


        Livewire::component('demo-wizard', \Ajtarragona\TComponents\Livewire\Demo\DemoWizard::class);
        Livewire::component('demo-step-1', \Ajtarragona\TComponents\Livewire\Demo\DemoStep1::class);
        Livewire::component('demo-step-2', \Ajtarragona\TComponents\Livewire\Demo\DemoStep2::class);
        
        // Livewire::component('demo-step-3', \App\Http\Livewire\WizardComicis\StepConoce::class);
        // Livewire::component('demo-step-4', \App\Http\Livewire\WizardComicis\StepResum::class);

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

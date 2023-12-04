<?php

namespace Ajtarragona\TComponents\Commands;

use Illuminate\Console\Command;
use \Artisan;
use \Exception;
use Illuminate\Support\Facades\File;  

class PublishAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 't-components:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Javascript and CSS assets';


    

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        // $resources_path = public_path('vendor/ajtarragona/js');
        //$routes_path = public_path('assets/js/routes.js');
       //dd($routes_path);
       	//$this->line("Exporting routes ...");
        // Artisan::call('laroute:generate',['-p'=>$resources_path,'-f'=>$this->routes_filename]);
        //Artisan::call('ziggy:generate',['path'=>$resources_path."/".$this->routes_filename.".js"]);
        
        
        //copy fonts to public
        $origin = public_path('vendor/ajtarragona/fonts');
        $destination= public_path('fonts');
        
        $this->line("Copying fonts ...");
        // dd($origin, $destination);
        File::copyDirectory($origin, $destination);

        // Storage::copy($origin,$destination);

        $this->line("Publishing assets ...");
        Artisan::call('vendor:publish',['--tag'=>'t-components-assets','--force'=>true]);
     
       
        
        
    }



}

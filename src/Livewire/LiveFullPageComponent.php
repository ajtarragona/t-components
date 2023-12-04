<?php
namespace Ajtarragona\TComponents\Livewire; 
use Livewire\Component;
use \Artisan;

class LiveFullPageComponent extends Component
{

    public $page_layout= "top-nav";
    public $main_nav= [];
    public $t_page= '';

    
    protected function publishPackageAssets(){
        if(config("t-components.autopublish")){
        //   Artisan::call('t-components:publish');
        Artisan::call('vendor:publish', [
            '--tag' => 't-components-assets', 
            '--force' => 1
        ]);
      }
  }
  
  public function view($view, $args=[]){
      return view("t-components::".$view, $args)
        ->extends('t-components::layouts.'.$this->page_layout, [
            'main_nav'=>$this->main_nav,
            't_page'=>$this->t_page,
        ])->section($this->page_layout=="blank"?'content':'body');
  }

}
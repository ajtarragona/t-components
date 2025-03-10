<?php
namespace Ajtarragona\TComponents\Livewire; 
use Livewire\Component;
use \Artisan;

class LiveFullPageComponent extends Component
{

   

    
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
    
        $viewPath = view()->getFinder()->find("t-components::".$view);
        dd($this, $viewPath, $this->page_layout, $args,$this->main_nav, $this->t_page);
      return view("t-components::".$view, $args)
        ->extends('t-components::layouts.'.$this->page_layout, [
            'main_nav'=>$this->main_nav,
            't_page'=>$this->t_page,
        ])->section($this->page_layout=="blank"?'content':'body');
  }

}
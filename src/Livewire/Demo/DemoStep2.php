<?php

namespace Ajtarragona\TComponents\Livewire\Demo;

use Ajtarragona\TComponents\Livewire\BaseWizardStep;
use Ajtarragona\TComponents\Livewire\WizardContext;

use Exception;

class DemoStep2 extends BaseWizardStep 
{
    
    public $view_namespace ="t-components";
    public $view = "docs.sections.forms.wizard.step2";

    public $component_name ="demo-step-2";
    
    public $title = "Segon pas";
    public $icon = "plus";

    public $strings=[
        "Back" =>"Tornar",
        "Next" =>"Següent",
        "Submit" =>"Confirmar",
    ];


    protected function init(WizardContext $context){
       
    }
    
    public function viewAttributes(){
        return [
            
        ];
    }

    public function hasValidators(){
        return true;
    }
    
    public function getValidators(){
         $this->validators=[
            'var1' => 'required'
         ];
       
        return $this->validators;
    }

    
    
 

    // public function submit($request=[]){
    //     // if(!isset($this->comici["id"])){
    //     //     $comici_obj=Comici::create($this->comici);
    //     //     $this->comici["id"]=$comici_obj->id;
    //     // }else{
    //     //     Comici::where('id',$this->comici["id"])->update($this->comici); 
    //     // }
    // }   


    // public function rollback(){
    //     // $this->debug("rollback");
    //     // $this->debug($this->comici);
    //     // if(isset($this->comici["id"]) && $this->comici["id"]){
    //     //     try{
    //     //         Comici::where('id',$this->comici["id"])->delete();
    //     //         unset($this->comici["id"]);
    //     //     }catch(Exception $e){
                
    //     //     }
    //     // }
    // }   
}
<?php

namespace App\Http\Livewire\WizardComicis;

use App\Http\Livewire\BaseWizardStep;
use App\Http\Livewire\WizardContext;
use App\Models\Comici;
use App\Models\Partit;
use App\Models\PartitBase;

class StepPartits extends BaseWizardStep 
{
    public $view = "step-partits";

    public $component_name ="comicis-step-partits";
    public $title = "backend.Partits";
    public $icon = "person-booth";

    
    public $comici_id;
    public $partits_triats = [];
    
    protected $validators = [
        'partits_triats' => 'required|min:2'
    ];
    
    public $strings=[
        "Back" =>"backend.Back",
        "Next" =>"backend.Next",
        "Submit" =>"backend.Submit",
    ];

    protected function init(WizardContext $context){
        $this->comici_id = $context->parent()->comici_id ?? null;
    
        // dd($this->comici_id);
        $comici = $this->comici_id ? Comici::find($this->comici_id) : new Comici();
        
        if($partits_triats = $context->get('comicis-step-partits')->partits_triats ?? null){
            $this->partits_triats = $partits_triats;
        }else{
            $this->partits_triats= $comici->partits->pluck('id')->map(function($item){
                return "".$item;
            })->toArray();
        }
    }

    public function viewAttributes(){
        return [
            'partits' => PartitBase::all(),
        ];
    }
    
    // public function submit($request=[]){
    //     // dump("Submit step 2");if(isset($this->comici["id"])){
    //     if($this->comici_id){
    //         $comici_obj=Comici::find($this->comici_id);
    //         $comici_obj->partits()->sync($this->partits_triats);
    //     }
    // }

    
}
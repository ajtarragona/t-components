<?php

namespace Ajtarragona\TComponents\Livewire\Demo;

use Ajtarragona\TComponents\Livewire\BaseWizard;
use App\Jobs\ImportarConoce;
use App\Jobs\ProcessarImportConoce;
use App\Models\TipusComici;
use App\Models\Comici;
use App\Models\EstatComici;
use App\Models\Import;
use App\Models\Partit;
use App\Rules\ConoceFileValid;
use Exception;
use Illuminate\Support\Facades\Bus;
use Livewire\WithFileUploads;

class DemoWizard extends BaseWizard
{
   
    // public $component_id = "wizard-comicis";
    public $view_namespace ="t-components";
    public $view = "docs.sections.forms.wizard.common";
    // public $stepIndex=2;

    protected $queryString = ['s' => ['except' => 'demo-step-1']];
 
    public $comici_id=null;
   
    protected $steps = [
       'Ajtarragona\TComponents\Livewire\Demo\DemoStep1',
       'Ajtarragona\TComponents\Livewire\Demo\DemoStep2',
    //    'Ajtarragona\TComponents\Livewire\Demo\StepConoce',
    //    'Ajtarragona\TComponents\Livewire\Demo\StepResum',
    ];
   


    public function mount($comici_id=null){
        parent::mount();
        
        
        // $this->comici_id=$comici_id;        
    }


    /** 
     * Sempre que carrega qualsevol 
     */
    // public function onLoadStep1(){
    //     $this->comici_id = $this->step_data[0]["comici"]["id"] ??  null;
        
    // }
    // public function onLoadStep0(){
    //     // $this->debug("onLoadStep " . $this->stepIndex);
    //     // $this->debug($this->step_data);
        
    //     $this->comici_id = $this->step_data[0]["comici"]["id"] ??  null;
    //     // dump($this->comici_id);
    // }
     /**
     * Write code on Method
     */
    protected function submit($request=[])
    {
        

        //Final 
        
        // return redirect()->route('backend.admin.comicis.edit',$comici->id);//
                // ->with('success', 'Comici created successfully.');
    }


  

}

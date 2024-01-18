<?php

namespace Ajtarragona\TComponents\Livewire\Demo;

use Ajtarragona\TComponents\Livewire\BaseWizardStep;
use Ajtarragona\TComponents\Livewire\WizardContext;

use Exception;
use Livewire\WithFileUploads;

class DemoStep1 extends BaseWizardStep 
{
    // use WithFileUploads;
    
    public $view_namespace ="t-components";
    public $view = "docs.sections.forms.wizard.step1";

    public $component_name ="demo-step-1";
    
    public $title = "Primer pas";
    public $icon = "upload";


    public $strings=[
        "Back" =>"Tornar",
        "Next" =>"Següent",
        "Submit" =>"Confirmar",
    ];

    protected function init(WizardContext $context){
       
    }


}
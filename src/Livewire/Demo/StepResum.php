<?php

namespace App\Http\Livewire\WizardComicis;

use App\Http\Livewire\BaseWizardStep;
use App\Http\Livewire\WizardContext;
use App\Models\Partit;
use App\Models\Import;
use App\Models\TipusComici;
use App\Rules\ConoceFileValid;
use Exception;
use Livewire\WithFileUploads;

class StepResum extends BaseWizardStep 
{
    
    public $view = "step-resum";

    public $component_name ="comicis-step-resum";
    
    public $title = "backend.Resum";
    public $icon = "check";
    public $comici = null;
    public $partits = [];
    public $import_summary = [];
    public $import_detail = [];
    public $import_detail_table = [];
    public $import_id = null;
    public $show_partits_detall = false;
    public $show_distribution = false;
    public $num_records = 0;
    public $tipus_comici;
   
    public $strings=[
        "Back" =>"backend.Back",
        "Next" =>"backend.Next",
        "Submit" =>"backend.Submit",
    ];

    protected function init(WizardContext $context){
        $this->comici = $context->get('comicis-step-definicio')->comici;
        // dd($this->comici);

        $this->tipus_comici = TipusComici::find($this->comici["tipus_comici_id"])->nom;
        $this->partits= $context->get('comicis-step-partits')->partits_triats ?? [];
        $partits=Partit::all();
        $tmp=[];
        foreach($partits as $partit){
            if(in_array($partit->id, $this->partits)){
                $tmp[]= $partit;//->toArray();
            }
        }
        $this->partits = $tmp;
        // dd($tmp);
        // dd($context->get('comicis-step-conoce'));
        $this->import_id = $context->get('comicis-step-conoce')->import_id ?? null;
        if($this->import_id){
            $this->import_summary=$this->getImport()->getSummary();
            $this->import_detail_table=$this->getImport()->getDetailTable();
            $this->num_records=$this->getImport()->num_records;
        }
        // $this->import_detail=$this->getImport()->getDetail();
        // dd($this->import_detail);
        // dd($this->import_summary);

    }

    public function getImport(){
        return Import::find($this->import_id);
    }

    

    public function toggle($name){
        $this->{$name} = !$this->{$name};

    }
   
    
}
<?php

namespace Ajtarragona\TComponents\Livewire;

class WizardContext 
{
    
    public $index;
    // protected $wizard;
    protected $wizard_data;
    protected $steps;


    public function __construct($wizard, $step_index, $wizard_data=[], $all_data=[])
    {
        // dump($all_data);
        $this->wizard_data=$wizard_data ? $wizard_data : $wizard->getProperties();
        $this->index=$step_index;

        foreach($wizard->getSteps() as $i=>$step){
            if(isset($all_data[$i])) $this->steps[] = to_object($all_data[$i]);
            else $this->steps[] = $step->getProperties();
        }
        // dd($this);
    }


    public function parent(){
        return $this->wizard_data;
    }

   
    public function get($index_or_name){
        if(is_integer($index_or_name)){
            $step = $this->steps[$index_or_name] ?? null;
        }else{
            $step= collect($this->steps)->where('component_name', $index_or_name)->first();
        }
        if($step) return $step;
        return null;
    }
    
    public function first(){
        return array_first($this->steps)  ?? null;
    }

    public function last(){
        return array_last($this->steps)  ?? null;
    }

    public function this(){
        return $this->steps[$this->index] ?? null;
    }

    public function next(){
        return $this->steps[$this->index+1] ?? null;
    }

    public function previous(){
        return $this->steps[$this->index-1] ?? null;
    }
    
    

    
}

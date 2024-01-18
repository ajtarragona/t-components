<?php

namespace Ajtarragona\TComponents\Traits; 


trait JqueryLivewireComponent
{
    public $component_id;
    public $dump;
    public $dump_counter=1;
    
    protected function generateComponentId(){
        if(!isset($this->component_id) || !$this->component_id) $this->component_id = uniqid('livewire-component-');
    }
    
    public function reInitJQuery(){
        $this->dispatchBrowserEvent('livewire-component-changed', [
            'dom_id'=>$this->component_id
        ]);
    }

    public function debug($txt){
        $this->dump.="\n" .$this->dump_counter.". ";
        $this->dump_counter++;
        if(is_object($txt) || is_array($txt)) $this->dump.=json_pretty($txt);
        else $this->dump.=$txt;
    }
}
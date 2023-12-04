<?php

namespace Ajtarragona\TComponents\Traits; 


trait WithTComponents
{
    public function initializeWithTComponents()
    {
        
        $this->listeners = array_merge($this->listeners, [
            't-changed' => 'setValue',
        ]);
    }

    public function setValue($args){
        // dump('setTSelectValue',$args);
        data_set($this,$args["name"],$args["value"]);
    }
}
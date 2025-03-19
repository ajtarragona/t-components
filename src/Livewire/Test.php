<?php
namespace Ajtarragona\TComponents\Livewire; 
use Livewire\Component;
use Illuminate\Support\Str;

class Test extends Component
{
    public LiveForm $form; 
 

    public function render()
    {
        
        $args=[];
        return view('t-components::docs.sections.forms.live-form', $args);
    }


    public function submitForm(){
        // dd($this->form);
        $this->validate();
       
    }


    
    
   
}
<?php
namespace Ajtarragona\TComponents\Livewire; 
use Livewire\Component;
use Illuminate\Support\Str;

class TestForm extends Component
{

    public $form=[
        'text1'=>null,
        'text2'=>null,
        'select1'=>null,
        'select_multi'=>null,
        'data'=>null
    ];

    public function render()
    {
        
        $args=[];
        return view('t-components::docs.sections.forms.live-form', $args);
    }



    protected $rules = [
        'form.text1' => 'required',
        'form.text2' => 'min:3|max:10',
        'form.select1' => 'required',
        'form.data' => 'required',
        'form.select_multi' => 'between:2,4',
    ];
    
    protected $messages = [
        // 'required'=>'El camp :attribute és obligatori',
        'required'=>'El camp és obligatori',
        'min'=>'La mida mínima és :min',
        'max'=>'La mida màxima és :max',
        'form.select_multi.min' => 'Tria com a mínim :min elements.',
        'form.select_multi.max' => 'Tria com a màxim :max elements.',
        'form.select_multi.between' => 'Has de triar entre :min i :max elements.',
    ];
    public function submitForm(){
        // dump($this->form);
        $this->validate();
       
    }


    
    
   
}
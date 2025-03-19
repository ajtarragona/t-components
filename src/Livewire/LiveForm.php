<?php
namespace Ajtarragona\TComponents\Livewire; 
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LiveForm extends Form
{
    #[Validate('required')]
    public $title = '';
 
    #[Validate('required|min:1|max:10')]
    public $content = '';

    #[Validate('required')]
    public $data;
    
    #[Validate('required')]
    public $select1;
    
    #[Validate('between:1,2')]
    public $select_multi=[];


    protected $messages = [
        // 'required'=>'El camp és obligatori',
        'required'=>'El camp :attribute és obligatori',
        'min'=>'La mida mínima és :min',
        'max'=>'La mida màxima és :max',
        'select_multi.between' => 'Has de triar entre :min i :max elements.',
    ];
}
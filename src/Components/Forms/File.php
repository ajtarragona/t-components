<?php

namespace Ajtarragona\TComponents\Components\Forms;


class File extends Input
{


    protected $view = 'forms.file';


    public $color = '';
    public $icon = null;
    public $size = 'md';
    public $allowedTypes = '';
    public $maxsize = null;
    public $placement = 'left';
    public $containerClass = '';
    public $class = '';
    public $label = '';
    public $formText = '';
    public $signed = false;
    public $autoUpload = false;
    public $files = null;
     

    
    public function __construct(
        $id = null, 
        $name=null, 
        $required=false, 
        $disabled=false, 
        $readonly=false,
        $multiple=false,
        
        $color = '',
        $icon = null,
        $size = 'md',
        $allowedTypes = '',
        $maxsize = null,
        $placement = 'left',
        $containerClass = '',
        $class = '',
        $label = '',
        $formText = '',
        $signed = false,
        $autoUpload = false,
        $files = null
       
    ){

        // dd(get_defined_vars());
        parent::__construct(get_defined_vars());
        // dd($this);
            
    }

    
 
 
}

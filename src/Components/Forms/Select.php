<?php

namespace Ajtarragona\TComponents\Components\Forms;

use ReflectionFunction;

class Select extends Input
{

    protected $view = 'forms.select';

    
    public $dataOptions = [];

    public $placeholder = 'Select an option';
    public $limit =  20;
    public $color =  'default';
    public $class =  '';
    public $outerClass =  '';
    public $menuClass =  '';
    public $label =  '';
    public $icon =  null;
    public $size =  'md';
   
    public $searchPlaceholder =  'Type to search...';
    public $emptyOptionsMessage =  'No results.';
    public $allowClear =  false;
    public $selectedLabelLimit =  false;
    public $selectedLabelLimitText =  'and :num more...';
    public $search =  false;
    public $inlineSearch =  false;
    public $selected =  '';
    public $width =  false;
    public $height =  false;
    public $selectedLabelPrefix =  null;
    public $selectedLabelSufix =  null;
    public $selectedLabelGlue =  null;
    public $native =  false;
    public $dataSrc = null;
    public $dataSrcMethod = null;
    public $dataSrcParams = null;
    public $prefetch = false;
    public $termName = false;
    public $limitName = null;
    public $grouped = false;
    public $lazyLoad =  false;
    public $overflow =  false;
    public $overlay =  false;
    public $overlayColor =  false;
  
    

    
    public function __construct(
        $id = null, $name=null, $required=false, $disabled=false, $multiple=false,
        $dataOptions = [], $placeholder = 'Select an option', $limit =  20, $color =  'default', $class =  '', $outerClass =  '', $menuClass =  '', $label =  '', $icon =  null, $size =  'md'  , $searchPlaceholder =  'Type to search...', $emptyOptionsMessage =  'No results.', $allowClear =  false, $selectedLabelLimit =  false, $selectedLabelLimitText =  'and :num more...', $search =  false, $inlineSearch =  false, $selected =  '', $width =  false, $height =  false, $selectedLabelPrefix =  null, $selectedLabelSufix =  null, $selectedLabelGlue =  null, $native =  false, $dataSrc = null, $dataSrcMethod = null, $dataSrcParams = null, $prefetch = false, $termName = false, $limitName = null, $grouped = false, $lazyLoad =  false, $overflow =  false, $overlay =  false, $overlayColor =  false
       
        )
    {
        parent::__construct($id , $name, $required, $disabled, $multiple);
        // dd($this);
        foreach(get_defined_vars() as $key=>$value){
            if( !in_array($key, ['id','name','required','disabled','multiple']) && $value!= $this->{$key}) $this->{$key} = $value;
        }
       
    //    dump($this);
    }

    
 
 
}

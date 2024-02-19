<?php

namespace Ajtarragona\TComponents\Components\Forms;

use Illuminate\View\Component;
use ReflectionClass;

class Input extends Component
{

    protected $view = 'forms.text';
    public $name=''; 
    public $inputname=''; //nombre final del input ( si es multiple se añadiran [] )
    public $errorname=''; //nombre del sistema de errors de laravel
    public $id='';
    public $required = false;
    public $disabled= false;
    public $multiple= false;


    
    
    public function __construct($id = null, $name=null, $required=false, $disabled=false, $multiple=false)
    {
       
        if(!$name) $name=uniqid('input_');
        
        if(!$id && $name) $id = 'id_'. str_replace(["[","]"],["_",""],$name);

        $this->id = $id;
        $this->name = $name;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->multiple = $multiple;


        $this->errorname=str_replace(["[","]"],[".",""],$this->name);
        $this->inputname=$name;
        if($this->multiple && ! ends_with($this->inputname, "[]")) $this->inputname.="[]";
    }



    private function getPublicProperties($obj=null, $inherited=true, $excluded = [] ){
        if(!$obj) $obj=$this;

        $reflect = new ReflectionClass(get_class($obj));
        // dump(get_class($this->wizard), $reflect);
        $props = $reflect->getProperties();
        // dump($props);
        // $ownProps = [];
        // dump($props);   
        $ret=[];    
        foreach ($props as $property) {
            // dump($property->getName() ." > ". $property->getModifiers());
            if ($property->isPublic()) { //solo atributos publicos
                if(!in_array($property->getName(), $excluded) &&($inherited || $property->getDeclaringClass()->getName() === get_class($obj))){ //si heredadas, todas, si no , solo de la clase actual
                    $ret[$property->getName()] = $obj->{$property->getName()};
                }
            }
        }
        // die();
        // 
        return $ret;
    }

    public function properties(){
        $ret= $this->getPublicProperties($this, true,['componentName','attributes']);
        // echo($ret["placeholder"]);
        return $ret;
    }

    protected function viewPath($view=null){
        $theme=config('t-components.theme');
        $ret='t-components::components.'.$theme;
        if($view) $ret.=".".$view; 
        return $ret;

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view($this->viewPath($this->view));
    }
}
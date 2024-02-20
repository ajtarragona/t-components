<?php

namespace Ajtarragona\TComponents\Components\Forms;

use Illuminate\View\Component;
use ReflectionClass;

class Input extends Component
{

    public $componentName = 't-select';

    protected $view = 'forms.text';

    public $id;
    public $required = false;
    public $disabled= false;
    public $readonly= false;
    public $multiple= false;
    public $name; 

    public $inputname; //nombre final del input ( si es multiple se añadiran [] )
    public $errorname; //nombre del sistema de errors de laravel
    
    
    public function __construct($attributes=[])
    {
       
        // dump($attributes);
        //siempre habrá ID
        $this->id=isset($attributes["id"]) ?  str_replace(["[","]"],["_",""],$attributes["id"]) : uniqid('input_');
        
      
        $this->name = $attributes["name"]??null;
        $this->required = $attributes["required"]??false;
        $this->disabled = $attributes["disabled"]??false;
        $this->readonly = $attributes["readonly"]??false;
        $this->multiple = $attributes["multiple"]??false;

        if($this->name){
            $this->errorname=str_replace(["[","]"],[".",""],$this->name);
            $this->inputname=$this->name;
        }

        if($this->multiple && ! ends_with($this->inputname, "[]")) $this->inputname.="[]";

       
        foreach($attributes as $key=>$value){
            if( !in_array($key, ['id','name','required','disabled','readonly','multiple']) && $value!= $this->{$key}){
                $this->{$key} = $value;
            }
        }
        // dd($this);
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

    public function properties($exclude=[]){
        $model=new static;
        $ret = collect($this->getPublicProperties($this, true, array_merge(['componentName','attributes'],$exclude)))->filter(function($property, $key) use($model){
            return $property != $model->{$key}??null;
        })->all();
        // dd($model, $ret);

        return  str_replace("\"","'", json_encode( $ret, JSON_HEX_APOS|JSON_HEX_QUOT ));
        
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
        // $ret=view($this->viewPath($this->view))->render();
        // return $ret;

        // if($this->may_have_errors) $ret.=view($this->viewPath('forms._input_error'))->render();

        // return $ret;
    }
}
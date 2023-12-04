<?php

namespace Ajtarragona\TComponents\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    
    
    public $data=[];
    public $color="default";
    public $size = "md";
    public $block = false;
    // public $name='';
    // public $id='';
    public $icon=null;
    public $max_height=null;
    // public $required = false;
    // public $disabled= false;
    public $selected = null;
    // public $multiple = false;
    public $allow_clear=true;
    public $multiple=false;
    

    // public $open=false;
    // public $options_url=null;
    // public $fetch_on_show=false;
    // public $options_method="get";
    // public $filtered_options=[];
    // public $selected_preview = "";
    public $label;
    public $label_position="top";
    // public $style = "default";
    // public $placeholder= 'Choose...';
    // public $multiple=false;
    // public $selected_label_limit=5;
    // public $selected_label_glue=", ";
    // public $class="";
    // public $outer_class="";
    // public $model=null;
    // public $search=false;
    // public $term=null;
    // public $block=false;
    // public $term_min_length=2;

    
    public function __construct($color=false, $data=[], $icon=null,$selected=null,$block=null,$allow_clear=true,$label=null,$multiple=false)
    {
        //
        // dd($this);
        // dump($color);
        $this->color=$color;
        $this->data=$data;
        $this->icon=$icon;
        $this->selected=$selected;
        $this->block=$block;
        $this->allow_clear=$allow_clear;
        $this->label=$label;
        // $this->prepareData();
    }

    public function getColor() {
        // $selOption=$this->getSelectedOption();
        // if(!$this->multiple && isset($selOption["style"])){
        //     return $selOption["style"];
        // }
        return $this->color=="default"?($this->color." border"):$this->color;
    }

    public function getIcon() {
        // $selOption=$this->getSelectedOption();
        // if(!$this->multiple && isset($selOption["icon"])){
        //     return $selOption["icon"];
        // }
        return $this->icon;
    }

    protected function prepareData(){
        $data=[];
        
         if(is_assoc($this->data)){
             foreach($this->data as $key=>$value){
                 $data[$key]=["key"=>$key,"value"=>$value];
             }
         }else{
                 foreach($this->data as $value){
                     if(!is_array($value)){
                         $data[$value]=["key"=>$value,"value"=>$value];
                     }else{
                         $d=array_merge(["key"=>0,"value"=>""],$value); //minimo que tenga key y value
                         $data[$d["key"]]=$d;
                     }
                 }
         }
        
        $this->data=$data;
        // $this->filtered_options=$this->options;
 
     }
 
 
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $theme=config('t-components.theme');
        return view('t-components::components.'.$theme.'.forms.select');
    }
}

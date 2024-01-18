<?php

namespace Ajtarragona\TComponents\Livewire;

use Ajtarragona\TComponents\Traits\JqueryLivewireComponent;
use Ajtarragona\TComponents\Traits\ReflectLivewireComponent;
use Exception;
use Livewire\Component;

class BaseWizardStep  extends Component
{

    use JqueryLivewireComponent;
    use ReflectLivewireComponent;
    
    protected $wizard;
    protected $can_submit;
    protected $validators=[];
    public $view_namespace;
    public $view;
    public $component_name;

    public $index;
    public $total;
    public $icon;
    public $title;
    public $strings=[];
    public $allow_free_navigation=false;
    public $wizard_data=[];

    protected $excluded_properties = ["strings","index","total","icon","title","view","view_namespace","allow_free_navigation"];
    protected $listeners = ['rollback' => 'doRollback'];

    
    private function getWizardInfo($wizard=null, $index=null){
        if($wizard){
            // dd($wizard);
            $this->index = $index;
            $this->view_namespace = $wizard->view_namespace;
            $this->wizard_data = $this->getPublicProperties($wizard, false , $this->excluded_properties);
            $this->allow_free_navigation = $wizard->allow_free_navigation;
            $this->strings = array_merge($wizard->strings ?? [] , $this->strings ?? [] );
            $this->total = count($wizard->getSteps());
            // dd($this);
        }
    }

    public function __construct($id, $wizard=null, $index=null)
    {
        parent::__construct($id);
        // dd($wizard);
        $this->getWizardInfo($wizard, $index);
        
    }

    public function title(){
        return __($this->title);
    }

    
    public function mount($wizard, $index, $data=[], $all_data=[]){
        $this->getWizardInfo($wizard, $index);
        $context= $wizard->getContext($index, $data, $all_data);
            
        $this->generateComponentId();
        foreach($data as $key=>$value){
            $this->{$key} = $value;
        }
        
        if(method_exists($this, 'init')){
            
            $this->init( $context );
            
            // $this->init([
            //     "wizard"=> $this->wizard_data,
            //     "previous"=>$all_data[$index-1] ?? [],
            //     "all"=>$all_data
            // ]);
        }
       
    }
    
    public function loadStep(){
        // dd("loaded", $this->index);
        $this->emitUp('stepLoaded', $this->index);
                
    }

    public function hydrate(){
        // if(method_exists($this, 'init')){
        //     $this->init();
        // }
    }

    public function hasPrevious(){
        return $this->index > 0;
    }

    public function hasNext(){
        return $this->index < ($this->total-1);
    }
    public function canSubmit(){
        return ($this->index == ($this->total-1)) || $this->can_submit;
    }


    private function appendAttributes($args=[]){
        if(method_exists($this, 'viewAttributes')){
            $viewAttributes=$this->viewAttributes();
            $args=array_merge($args, $viewAttributes ?? [] );
        }
       return $args;
    }
   
    

    public function render(){

        $path=(($this->view_namespace)?($this->view_namespace.'::'):'').$this->view;
        
        if(view()->exists($path)){
            $args=$this->appendAttributes();

            // dd($this->wizard->getPublicProperties());
            //le añado los atributos publicos del wizard
            // $args=array_merge($args,$this->wizard->getPublicProperties());

            $args=array_merge($args,[
                // 'wizard'=>$this->wizard,
                'step'=>$this
            
            ]);
            
            
            return view($path, $args);
        }
    }

    public function hasValidators(){
        return !empty($this->validators);
    }

    public function getValidators(){
        return $this->validators;
    }
    

    public function hasSubmit(){
        return method_exists($this, 'submit');
    }
    public function hasRollback(){
        return method_exists($this, 'rollback');
    }

    public function doRollback(){
        if($this->hasRollback()){
            // dump('doRollback abans',$this->component_name, $this->getPublicProperties(null, false , $this->excluded_properties));
            $this->rollback();
            // dd('doRollback despres',$this->component_name, $this->getPublicProperties(null, false , $this->excluded_properties));
            $this->emitUp('stepLoaded', $this->index, $this->getPublicProperties(null, false , $this->excluded_properties));

        }
        
        $this->reInitJQuery();

    }
    
   
    public function __($string){
        // dd($this);
        if(isset($this->strings[$string])) return __($this->strings[$string]);
        return __($string);
        
    }

    public function updated(){
        $this->reInitJQuery();
    }

    public function next($submit=false){
        // dd($this);
        if( $submit || ($this->index < $this->total-1) ){
            if($this->hasValidators() && !$this->allow_free_navigation){
                // dd($currentStep->getValidators());
                $this->reInitJQuery();
                $this->validate($this->getValidators());
            }

            $data=$this->getPublicProperties(null, false , $this->excluded_properties);
            
            if($this->hasSubmit()){
                $this->submit($data);
            }
           
            $data=$this->getPublicProperties(null, false , $this->excluded_properties);
            
            if($submit){
                //es l'últim. Emetem cap al pare passant les dades del formulari
                $this->emitUp('submitForm',$data);
            }else{
                // No és l'últim,  Emetem cap al següent passant les dades del formulari
                $this->emitUp('next',$data);
            }
            
        }
       
                
        
    }

   /**
     * Write code on Method
     */
    public function back()
    {
        // dd($this->index, $this->hasRollback());
        if($this->index>0){
            
            $data=$this->getPublicProperties(null, false , $this->excluded_properties);
           
            $this->emitUp('back', $data);
            
        }
    }


    public function submitForm()
    {
        $this->next(true);
    }


    public function getProperties(){
        return to_object( $this->getPublicProperties(null, false, $this->excluded_properties) );
    }
}
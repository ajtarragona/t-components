<?php

namespace Ajtarragona\TComponents\Livewire;

use Ajtarragona\TComponents\Traits\JqueryLivewireComponent;
use Ajtarragona\TComponents\Traits\ReflectLivewireComponent;
use Livewire\Component;

abstract class BaseWizard extends Component
{
    use JqueryLivewireComponent;
    use ReflectLivewireComponent;

    public $stepIndex = 0;
    public $s = null;
    public $total = 0;
    public $view_namespace;
    public $view;
    public $allow_free_navigation=false;

    protected $listeners = ['next' => 'next', 'back'=>'back', 'submitForm'=>'submitForm', 'stepLoaded'=>'stepLoaded'];
    protected $excluded_properties = ["view","view_namespace","allow_free_navigation"];
    
    protected $queryString = ['s'];
 
    public $strings=[
        "Back" =>"Back",
        "Next" =>"Next",
        "Submit" =>"Submit",
    ];
   

    //class names of the livewire components for each step
    protected $steps = [];
    public  $step_data = [];
    public $step_component_name = null;
    

   
    public function mount(){
        $this->generateComponentId();
        $this->total = count($this->steps);
        $this->steps=$this->prepareSteps($this->steps);
        // dd($this->steps);
        $this->step_component_name = $this->getCurrentStep()->component_name;
        // dd($this);
        if($this->view){
            $path=(($this->view_namespace)?($this->view_namespace.'::'):'').$this->view;
        // dd($path);
            if(view()->exists($path)){
                $this->view=$path;
            }
        }
// dd($this);
    }

    public function hydrate(){
        // dump("hydrate");
        $this->steps=$this->prepareSteps($this->steps);
        $this->step_component_name = $this->getCurrentStep()->component_name;
        //le añado las propiedades publicas del step
        // $this->addStepProperties();
        
        // dump($this);
    }


  

    public function render()
    {   

        // dump("render",$this);
        // $this->steps = $this->prepareSteps($this->steps);

        // session(['errors' => $this->getErrorBag()]);
        // dd($this);
        $args=[
            
            'wizard'=>$this,
            'step'=>$this->getCurrentStep(),
            'steps'=>$this->steps,
        ];
        
        // dd($args );

        $theme=config('t-components.theme');

        return view('t-components::components.'.$theme.'.wizard', $args);
    }

   
  
    
    
    public function getCurrentStep(){
        $step= $this->steps[$this->stepIndex];
        $step=$this->prepareStep($step,$this->stepIndex);
        return $step;
    }

    public function getSteps(){
        return $this->steps;
    }


    private function prepareStep($step,$i){
        // dump("prepareStep", $step, $i);
        if(is_string($step)){
            return new $step($this->id."_step_".$i, $this, $i);
            
        }else if($step instanceof BaseWizardStep){
            return  $step;
        }
        return null;
    }

    private function prepareSteps($steps){
        $ret=[];
        // dump("prepareSteps");
        foreach($steps as $i=>$step){
            $tmp=$this->prepareStep($step,$i);
            // dd($tmp);
            if($tmp) $ret[]=$tmp;
        }
        // dd($ret);
        return $ret;
    }

       
    public function getAllValidators(){
        $ret=[];
        foreach($this->steps as $i=>$step){
            $step=$this->prepareStep($step,$i);
            $ret=array_merge($ret, $step->getValidators() ?? []);
        }
        return $ret;
    }
   
    
    public function goTo($index){
        if($this->allow_free_navigation){
            if($index>=0 && $index < $this->total) $this->stepIndex=$index;
        }
        
        // $this->reInitJQuery();
    }

    
  
   
    public function next($data=[]){
        $this->step_data[$this->stepIndex] = $data;
        $this->stepIndex++;
        $this->step_component_name = $this->getCurrentStep()->component_name;
        // dd($this->step_component_name);
        // dump('onSubmitStep'.$this->stepIndex);
        // dd(method_exists($this, 'onSubmitStep'.($this->stepIndex-1)));
        if(method_exists($this, 'onSubmitStep')){
            $this->{'onSubmitStep'}($data);
        }

        if(method_exists($this, 'onSubmitStep'.($this->stepIndex-1))){
            $this->{'onSubmitStep'.($this->stepIndex-1)}($data);
        }

        // $this->reInitJQuery();
        

    }



    public function stepLoaded($index, $data=[]){
        // $this->debug("stepLoaded ".$index);
        // dd($data);
        $this->step_data[$index]=$data;
        if(method_exists($this, 'onLoadStep')){
            $this->{'onLoadStep'}();
        }
        if(method_exists($this, 'onLoadStep'.($index))){
            $this->{'onLoadStep'.($index)}();
        }
        $this->s=$this->getCurrentStep()->component_name;
        $this->reInitJQuery();
    }


    public function back($data=[]){
        // $this->debug("back");
        // $prev_component=$this->prepareStep($this->steps[$this->stepIndex-1], $this->stepIndex-1);
        $this->step_data[$this->stepIndex] = $data;
        $this->stepIndex--;
        $this->step_component_name = $this->getCurrentStep()->component_name;
        // $this->debug($this->step_component_name);
        $this->emitTo($this->step_component_name,'rollback');
        
        
    }
    


    /**
     * Nuestro componente deberá implementar este método.
     * Es lo que se ejecutarà una vez llegamos al final
     * del wizard.
     * Nos llegarán por paràmetro todos los datos del formulario.
     * Cada paso del wizard, opcionalmene, puede implementar también el método submit
     *  
     */
    abstract protected function submit($request=[]);

    /**
     * Write code on Method
     */
    public function submitForm($data=[])
    {
        $this->step_data[$this->stepIndex] = $data;

        if($this->allow_free_navigation){
            $validators=$this->getAllValidators();
            //TODO
            //harbia que hacer validacion de cada step
            // $this->reInitJQuery();
            // $validatedData = $this->validate($validators);
        }
        


        //hago el submit general si lo tienen definido
        $request=[];
        foreach($this->step_data as $index=>$values){
            if($values){
                foreach($values as $key=>$value){
                    $request[$key]=$value;
                }
            }
        }

        $this->submit($request);
    }
  
   

    /**
     * Write code on Method
     */
    // public function clearForm()
    // {
       
    // }

    public function __($string){
        if(isset($this->strings[$string])) return __($this->strings[$string]);
        return __($string);
    }

    public function getContext($index, $wizard_data=[], $all_data=[]){
        return new WizardContext($this, $index, $wizard_data, $all_data);
    }

    public function getProperties(){
        return to_object( $this->getPublicProperties(null, false , $this->excluded_properties) );
    }
    
}

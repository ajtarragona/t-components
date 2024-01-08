<?php
namespace Ajtarragona\TComponents\Livewire; 
use Livewire\Component;
use Illuminate\Support\Str;

class Docs extends LiveFullPageComponent
{

    public $s=null;
    public $t_page='overview';
    public $src_path=null;
    public $src_type=null;
    public $dummy=null;
    public $dummyNumber=0;
    public $dummy2=null;
  
    

    protected $listeners = [
        'openSrc'=>'openSrc'
    ];


    
    protected $queryString = [
        // 's' => ['except' => ''],
        // 't_page' => ['except' => 'overview','as'=>'page'],
    ];
    public $opciones=[
        "aaaa",
        "bbbb",
        "ccccc",
        "ddddd",
        "aaaabbb",
        "aaaaccc",
        "dddddeeee"
    ];


    public $main_nav=[];

        

    public function mount($t_page=null){
        $this->publishPackageAssets();
        $this->main_nav=config('t-components.docs.main_nav',[]);
        $this->page_layout= session('t-components-docs-layout',"top-nav");
        // if(request('t_page')) $this->t_page=request('t_page');
        
    }

    public function render()
    {
        
        // dd($this->opciones,collect($this->opciones));
        if($this->s){
            $filtered=collect($this->opciones)->filter(function($item){
                return Str::contains($item,$this->s);
            })->toArray();
            // dd($filtered);
        }else{
            $filtered=$this->opciones;
        }
       
        
        $src="";
        if($this->src_path) $src=includeSrc($this->src_path);
        $args=compact('filtered','src');
        
// dd($args);

        return $this->view('docs.home', $args);
    }


    public function openSrc($src_path=null,$src_type=null){
        // dump($src_path,$src_type);
        $this->src_path=$src_path;
        $this->src_type=$src_type;
        $this->dispatchBrowserEvent('src-opened');
    }
    


    
   
}
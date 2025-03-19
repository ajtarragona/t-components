<?php
namespace Ajtarragona\TComponents\Livewire; 
use Livewire\Component;
use Illuminate\Support\Str;
use Artisan;
    
class Docs extends Component
{

    public $page_layout= "top-nav";
    

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


    public $main_nav=[
        
    ];

    protected function publishPackageAssets(){
        if(config("t-components.autopublish")){
            //   Artisan::call('t-components:publish');
            Artisan::call('vendor:publish', [
                '--tag' => 't-components-assets', 
                '--force' => 1
            ]);
        }
  }
  
  public function view($view, $args=[]){
    
        $viewPath = view()->getFinder()->find("t-components::".$view);
        // dd($this, $viewPath, $this->page_layout, $args,$this->main_nav, $this->t_page);
      return view("t-components::".$view, $args)
        ->extends('t-components::layouts.'.$this->page_layout, [
            'main_nav'=>$this->main_nav,
            't_page'=>$this->t_page,
        ])->section($this->page_layout=="blank"?'content':'body');
  }  

    public function mount($t_page=null){
        $this->publishPackageAssets();
        $this->page_layout= session('t-components-docs-layout',"top-nav");
        $this->main_nav = config('t-components.main_nav');
        // dd($this);
        // if(request('t_page')) $this->t_page=request('t_page');
        
    }

    public function render()
    {
        // dd("RENDER");
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
// dd($args);

        return $this->view('docs.home', $args);
    }


    public function openSrc($src_path=null,$src_type=null){
        // dump($src_path,$src_type);
        $this->src_path=$src_path;
        $this->src_type=$src_type;
        $this->dispatch('src-opened');
    }
    


    
   
}
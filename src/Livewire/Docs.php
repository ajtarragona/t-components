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


    public $main_nav=[
        "getting_started"=>[
            "name"=>"Getting Started",
            "icon"=>"bi-book-half",
            "items" =>[
                "overview"=>[
                    "name"=>"Overview",
                    "icon"=>null,
                ],
                "alpine"=>[
                    "name"=>"Alpine",
                    "icon"=>null,
                ],
            ]
        ],
        "components"=>[
            "name"=>"Components",
            "icon"=>"bi-boxes",
            'items'=>[
                "components_alerts"=>[
                    "name"=>"Alerts",
                    "icon"=>null,
                ],
                "components_buttons"=>[
                    "name"=>"Buttons",
                    "icon"=>null,
                ],
                "components_modals"=>[
                    "name"=>"Modals",
                    "icon"=>null,
                ]
            ]
        ],
        "forms"=>[
            "name"=>"Forms",
            "icon"=>"bi-boxes",
            'items'=>[
                "forms_forms"=>[
                    "name"=>"Forms",
                    "icon"=>null,
                ],
                "forms_fields"=>[
                    "name"=>"Form Fields",
                    "icon"=>null,
                ],
                "forms_texts"=>[
                    "name"=>"Text",
                    "icon"=>"input-cursor",
                ],
                "forms_textareas"=>[
                    "name"=>"Textareas",
                    "icon"=>"textarea-resize",
                ],
                "forms_texteditors"=>[
                    "name"=>"Rich Text Editors",
                    "icon"=>"textarea-t",
                ],
                "forms_numbers"=>[
                    "name"=>"Numbers",
                    "icon"=>"123",
                ],
                "forms_selects"=>[
                    "name"=>"Selects",
                    "icon"=>'menu-down',
                
                ],
                "forms_checkboxes"=>[
                    "name"=>"Checks & radios",
                    "icon"=>"ui-checks-grid",
                ],
                "forms_ranges"=>[
                    "name"=>"Ranges",
                    "icon"=>"sliders",
                ],
                "forms_dates"=>[
                    "name"=>"Dates",
                    "icon"=>'calendar',
                ],
                "forms_files"=>[
                    "name"=>"Files",
                    "icon"=>"file-earmark",
                ],
                "forms_colors"=>[
                    "name"=>"Color pickers",
                    "icon"=>"eyedropper",
                ],
                "forms_icons"=>[
                    "name"=>"Icon pickers",
                    "icon"=>"eyedropper",
                ]
            ]
        ]
    ];

        

    public function mount($t_page=null){
        $this->publishPackageAssets();
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
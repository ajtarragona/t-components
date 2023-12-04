<?php

namespace Ajtarragona\TComponents\Controllers; 


use Illuminate\Http\Request;
use \Artisan;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{

	


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
		return view("t-components::".$view, $args);
	}

	// public function home(){ 
 //      $this->publishPackageAssets();
 //      return $this->view("home");
 //  	}
}
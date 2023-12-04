<?php


if (! function_exists('includeSrc')) {
	function includeSrc($p=false){
		try{
			$view= view($p);//->with('products', $products)->render();
			if($view){

				$path=$view->getPath();

				//echo $path;
				//if(strpos($p,".")===false) $path.=".blade.php";
				
				if(is_file($path)){
					return file_get_contents($path);
				}
			}
		}catch(InvalidArgumentException $e){
			return "";
		}
	}
}


if (! function_exists('includeClassSrc')) {
	function includeClassSrc($classpath){
		try{
			$reflector = new ReflectionClass($classpath);//.'::class');
			
			$path= $reflector->getFileName();
	
			if(is_file($path)){
				return file_get_contents($path);
			}

		}catch(Exception $e){
			// dd($e);
			return "";
		}
	}
}
<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;



if (! function_exists('svg')) {
	
	function svg($expression)
    {
        $expression = str_replace('.svg', '', $expression);
        $expression = "{$expression}.svg";
        // dd($expression);
        $filesystem = new Filesystem();
        $svg_content="";

        if (Str::startsWith($expression, 'http')) {
            $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            ); 
            $svg_content=file_get_contents($expression,  false, stream_context_create($arrContextOptions));
        }else{

            $svg_paths = config('t-components.svg_paths');

            foreach ($svg_paths as $key => $path) {
                $file_path = str_replace('//', '/', "{$path}/{$expression}");
                if (file_exists($file_path)) {
                    $svg_content = $filesystem->get($file_path);
                    break;
                }
            }
        }

        if($svg_content){
            return $svg_content;
        }
        return "";

    }
}
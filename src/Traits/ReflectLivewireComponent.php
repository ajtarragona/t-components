<?php

namespace Ajtarragona\TComponents\Traits; 

use ReflectionClass;

trait ReflectLivewireComponent
{
    public function getPublicProperties($obj=null, $inherited=true, $excluded = [] ){
        if(!$obj) $obj=$this;

        $reflect = new ReflectionClass(get_class($obj));
        // dump(get_class($this->wizard), $reflect);
        $props = $reflect->getProperties();
        // dd($props);
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
}
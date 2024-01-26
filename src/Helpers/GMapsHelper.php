<?php

namespace Ajtarragona\TComponents\Helpers;


class GMapsHelper
{

  public $points;
  public $longitud;

  // Constructor


  public static function generateRectanglePoints($bounds){
    return [
        [ "lat"=> $bounds["north"], "lng"=>$bounds["east"] ],
        [ "lat"=> $bounds["south"], "lng"=>$bounds["east"] ],
        [ "lat"=> $bounds["south"], "lng"=>$bounds["west"]],
        [ "lat"=> $bounds["north"], "lng"=>$bounds["west"]],
    ];

  }


  public static function generateCirclePoints($center, $radius, $numPoints=100){
    $points = array();
  
    for ($i = 0; $i < $numPoints; $i++) {
      $theta = deg2rad($i * (360 / $numPoints));

        // Ajustar la conversión de metros a grados basándote en la latitud actual y el tamaño del mapa
        $radiusDegreesLat = $radius / (111.32 * 1000);
        $radiusDegreesLng = $radius / (111.32 * 1000 * cos(deg2rad($center['lat'])));

        $lat = $center['lat'] + $radiusDegreesLat * cos($theta);
        $lng = $center['lng'] + $radiusDegreesLng * sin($theta);

        $points[] = array('lat' => $lat, 'lng' => $lng);
    }
    return $points;
  }


  public static function encodePolygons($points)
  {
    $encoded = '';
    $index = 0;
    $lat_prev = 0;
    $lng_prev = 0;

    foreach ($points as $point) {
      $lat = $point['lat'];
      $lng = $point['lng'];

      $lat_diff = $lat - $lat_prev;
      $lng_diff = $lng - $lng_prev;

      $lat_prev = $lat;
      $lng_prev = $lng;

      $encoded .= self::encodeSingleValue($lat_diff);
      $encoded .= self::encodeSingleValue($lng_diff);
    }

    return $encoded;
  }

  private static function encodeSingleValue($value)
  {
    $value = (int)($value * 1e5);
    $value = ($value < 0) ? ~($value << 1) : ($value << 1);
    $encoded = '';

    while ($value >= 0x20) {
      $encoded .= chr((0x20 | ($value & 0x1F)) + 63);
      $value >>= 5;
    }

    $encoded .= chr($value + 63);
    return $encoded;
  }

  public static function miniMap(array $markers=[], array $options=[]){
      $circlesides=100;

      $defaults=[
        'width'=>300,
        'height'=>180,
        'maptype'=>"roadmap",
        'format'=>"PNG",
        'key'=>config('t-components.gmaps.api_key'),
        'zoom' => config('t-components.gmaps.default_zoom'),
        'center'=> config('t-components.gmaps.tgn_coords')
      ];

      $options = array_merge($defaults, $options);


        // dump($this->circlesides);
        $w = $options["width"];
        $h =  $options["height"];

        $options["size"] = $w."x".$h;

        
        // dd($this->center);
        $url="https://maps.googleapis.com/maps/api/staticmap?".http_build_query(array_except($options,['width','height','zoom','center','class'])); //."&key=".$apikey;
        
        if($markers){
            $prepared_markers=[];
            $polygons=[];
            $center=0;
            foreach($markers as $marker){
                $marker=to_array($marker);
                switch($marker["type"]??"marker"){  
                    case "marker":
                        if(isset($marker["location"])){
                            $center= $marker["location"]["lat"].",".$marker["location"]["lng"];
                            $prepared_markers[]=$center;
                        }
                        break;
                    default: //la resta    
                        

                        //definir los colores:
                        $bordercolor= isset($marker["bordercolor"]) ? ($marker["bordercolor"]."ff") : "bf002cff";
                        $borderweight=$marker["borderweight"]??2;

                        if($marker["type"]=="polyline"){
                            $backgroundcolor=$marker["backgroundcolor"]??"00000000"; //bg transparente
                        }else{
                            $backgroundcolor=$marker["backgroundcolor"]??"bf002c";
                            if(isset($marker["opacity"])){
                                $backgroundcolor.= dechex( round($marker["opacity"]*255));
                            }else{
                                $backgroundcolor.=dechex( round(0.5*255 ) ); //50%
                            }

                        }
                        $bordercolor=str_replace("#","",$bordercolor);
                        $backgroundcolor=str_replace("#","",$backgroundcolor);

                        $polygonurl= "color:0x" . $bordercolor . "|weight:" . $borderweight . "|fillcolor:0x". $backgroundcolor . "|";

                        if($marker["type"] =="circle" && isset($marker["center"]) && isset($marker["radius"])){
                            $marker["path"]=self::generateCirclePoints($marker["center"], $marker["radius"], $circlesides);
                            // dd($marker["path"]);
                        }else if($marker["type"]=="rectangle" && isset($marker["bounds"])){
                            $marker["path"]= self::generateRectanglePoints($marker["bounds"]);
                        }


                        if($marker["path"] ??null){
                            // dd($path);
                            if(in_array($marker["type"], ["polygon","circle","rectangle"])){
                                $marker["path"][]=$marker["path"][0]; //añado el primero para cerrar el polígono
                            }
                            //codifico las coordenadas
                            $encodedcoords=self::encodePolygons($marker["path"]);
                            // dd($marker["path"],$encodedcoords);
                            $polygonurl.= "enc:".$encodedcoords ;
                        }
                        
                        $polygons[]= $polygonurl;
                        break;
                   
                    
                }
            }
           
            if($prepared_markers) $url.="&markers=".implode("|",$prepared_markers);
            if($polygons) $url.="&path=".implode("&path=",$polygons);
        }else{
            $url.="&zoom=".$options["zoom"]."&center=".$options["center"];
        }

        
            
        return "<img src=\"".$url."\" class='".$options["class"]."'/>";
  }
}

<?php

namespace Ajtarragona\TComponents\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class DocsController extends BaseController
{

  

  public function test()
  {
    // $args=[];
    // return $this->view('docs.home', $args);
  }


  public function docs()
  {
    // $this->publishPackageAssets();
    // $args=[];
    // return $this->view('docs.home', $args);
  }

  
  public function setLayout($layout)
  {
    session(['t-components-docs-layout'=>$layout]);
    return back();//('t-components.docs');
    
  }
  public function testAjax(Request $request){
    // dd($request->all());
    // sleep(1);
    if($request->grouped){

      $data=[
          'Trains'=>[
              1=>['value'=>'Train 1','icon'=>'train-front'],
              2=>['value'=>'Train 2','icon'=>'train-front'],
              5=>['value'=>'Truluri','icon'=>'train-front'],
          ],
          'Cars'=>[
              3=>['value'=>'Car 1','icon'=>'car-front'],
              4=>['value'=>'Car 2','icon'=>'car-front'],
              6=>['value'=>'Cartrain','icon'=>'car-front'],
          ],
          'Planes'=>[
              7=>['value'=>'Jumbo','icon'=>'airplane'],
              8=>['value'=>'Boeing 747','icon'=>'airplane'],
              9=>['value'=>'Concord','icon'=>'airplane'],
          ]
        ];
       
        
        if($request->term){
          $ret=[];
          foreach($data as $gr_name=>$options){
              $options=collect($options)->filter(function($item) use ($request){
                if($request->term) return Str::contains(strtolower($item["value"]),strtolower($request->term));
                return true;
              })->toArray();
              if($options) $ret[$gr_name]=$options;
              
          }

        }else{
          $ret=$data;
        }
// dd($ret);
        // dd($request->limit);

        if($request->limit) $ret=array_slice($ret,0,$request->limit);
        return response()->json($ret);
    }else{

      
      $ret= [];

      for($i=0;$i<200;$i++){
        $ret[$i+1] = "Option ".($i+1);
      }

      $ret=collect($ret)->filter(function($item) use ($request){
        if($request->term) return Str::contains(strtolower($item),strtolower($request->term));
        return true;
      });
      
      if($request->page){
        $chunk=$ret->chunk($request->limit);
        $tmp=[];
        if(isset($chunk[$request->page-1])) $tmp=$chunk[$request->page-1];
        $ret = new LengthAwarePaginator($tmp, $ret->count(), $request->limit, $request->page);
        // dd($ret->all());
      }
      
      $ret=$ret->all();
        
      // dd($request->limit);
      if($request->limit) $ret=array_slice($ret,0,$request->limit, true);
      // dd($ret);
      //si hay seleccionados, los devuelvo siempre
      if($request->selected){
        $selected=$request->selected;
        if(!is_array($selected)) $selected=[$selected];
        $tmp=[];
          foreach($selected as $id){
            $tmp[$id]="Option ".$id;
          }
          // dd($tmp,$ret);
          $ret=$tmp+$ret;
          
      }

      // dd($ret);
      return response()->json($ret);
    }
  }

  public function testForm(Request $request)
  {
   
    return redirect()->back()->with(['formRequest'=>$request->except('_token','_method')]);
    
  }
  public function validatedForm(Request $request)
  {
   
    $request->validate([
        'f2-tf-1' => ['required'],
        'f2-tf-2' => ['max:10'],
    ]);
    
    return redirect()->back()->with(['formRequest'=>$request->all()]);
    
  }
 
}


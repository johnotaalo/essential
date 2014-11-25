<?php
class Arrays extends MY_Controller{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {

  }

  /**
  * [format description]
  * @param  [type] $array            [description]
  * @param  [type] $sorting_key      [description]
  * @param  [type] $new_column       [description]
  * @param  [type] $new_column_value [description]
  * @return [type]                   [description]
  */
  public function format($array,$sorting_key,$new_column,$new_column_value){
    $newArray['columns']=array();
    foreach ($array as $value) {

      foreach ($value as $k => $val) {
        if($k==$sorting_key){
          $sorting_val=$value[$k];
        }
        else if($k==$new_column){
          $column_key = $value[$k];
        }
        else if($k==$new_column_value){
          $column_val = $value[$k];
        }
        if($k!=$new_column_value && $k!=$new_column ){
          $newArray['data'][$sorting_val][$k]=$val;
          $newArray['columns'][]=$k;

          if($column_key!=NULL){
            $newArray['columns'][]=$column_key;
            $newArray['data'][$sorting_val][$column_key]=$column_val;
          }
        }

      }
    }
    $newArray['columns']=array_values(array_unique($newArray['columns']));
    return $newArray;
  }

  public function reset($array){
    // print_r($array);die;
    $newArray['columns']=array();

    foreach($array[0] as $k=>$v){
      $newArray['columns'][]=$k;
    }
    $newArray['data']=$array;
    return $newArray;

  }
}

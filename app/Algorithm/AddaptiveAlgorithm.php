<?php
namespace App\Algorithm;

use Illuminate\Http\Request;
use \App\Model\Questions;

class AddaptiveAlgorithm
{
  /**
   * @var array $data, stored the whole universal set of Data belong to a particular Section of GMAT exam
   */
  protected $section;

  /**
   * @var array $hard, stored the attempted set of Data belong to a particular Section of GMAT exam
   */
  protected $attempted;

  /**
   *
   */
  public function __construct($request)
  {
    $this->section = $request->session()->get('section');
    $this->attempted = (array) $request->session()->get('qid_array');
  }

  /**
   * @var array $data, stored the whole universal set of Data belong to a particular Section of GMAT exam
   */
   private function data()
   {
      return Questions::where("sec_id","=",$this->section)->pluck('qid')->toArray();
   }

  /**
   * @var array $easy, stored the easy set of Data belong to a particular Section of GMAT exam
   */
   private function easy()
   {
     return Questions::where("sec_id","=",$this->section)->where("dif","=","e")->pluck('qid')->toArray();
   }

  /**
   * @var array $medium, stored the medium set of Data belong to a particular Section of GMAT exam
   */
   private function medium()
   {
     return Questions::where("sec_id","=",$this->section)->where("dif","=","m")->pluck('qid')->toArray();
   }

  /**
   * @var array $hard, stored the hard set of Data belong to a particular Section of GMAT exam
   */
   private function hard()
   {
     return Questions::where("sec_id","=",$this->section)->where("dif","=","h")->pluck('qid')->toArray();
   }

  /**
   *
   */
  public function getArray($dif, $lastAttempt){
    if($dif=='e' && $lastAttempt=='p'){
      return  $this->mediumUnattempt();
    }
    elseif($dif=='e' && $lastAttempt=='f'){
      return $this->easyUnattempt();
    }
    elseif($dif=='m' && $lastAttempt=='p'){
      return $this->hardUnattempt();
    }
    elseif($dif=='m' && $lastAttempt=='f'){
      return $this->easyUnattempt();
    }
    elseif($dif=='h' && $lastAttempt=='p'){
      return $this->hardUnattempt();
    }
    elseif($dif=='h' && $lastAttempt=='f'){
      return $this->mediumUnattempt();
    }
    elseif($lastAttempt=='n'){
      return $this->unattempted();
    }
    else{
      return false;
    }
  }

  /**
   *
   */
  private function easyAttempt(){
    return array_intersect($this->easy(),$this->attempted);
  }

  /**
   *
   */
  private function mediumAttempt(){
    return array_intersect($this->medium(),$this->attempted);
  }

  /**
   *
   */
  private function hardAttempt(){
    return array_intersect($this->hard(),$this->attempted);
  }

  /**
   *
   */
  private function easyUnattempt(){
    return array_diff($this->easy(),$this->easyAttempt());
  }

  /**
   *
   */
  private function mediumUnattempt(){
    return array_diff($this->medium(),$this->mediumAttempt());
  }

  /**
   *
   */
  private function hardUnattempt(){
    return array_diff($this->hard(),$this->hardAttempt());
  }

  /**
   *
   */
  private function unattempted(){
    return array_unique(array_merge(array_merge($this->easyUnattempt(),$this->mediumUnattempt()),$this->hardUnattempt()));
  }
}

 ?>

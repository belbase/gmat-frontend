<?php
namespace App\Helper;

use App\Algorithm\RandomiseAlgorithm;
use Illuminate\Http\Request;

class RandomNumber
{
  /**
   * @var object to store if the given condition is addaptive or not
   */
  protected $session;

  /**
   * @var object to store if the given condition is addaptive or not
   */
  protected $data;

  /**
   * @var bool to store if the given condition is addaptive or not
   */
   protected $addapt;

   /**
    * @var object to store if the given condition is addaptive or not
    */
    protected $addaptObj;

  /**
   *
   *
   * @var array return the
   */
  public function __construct(Request $request){
    if($request->session()->has('section')){
      if($request->session()->get('section') == '3' || $request->session()->get('section') == '4'){
        $this->addapt = true;
        $this->addaptObj = new AddaptiveAlgorithm($request);
      }
    }
    $this->session = $request->session();
  }

  /**
   *
   *
   * @var array return the
   */
  public function fromArray()
  {
    if($this->session->has('qid_array')){
        $exclude=$this->session->get('qid_array');
    }
    else{
      $exclude = [];
    }
    $array=\App\Model\Questions::where('sec_id','=',$this->session->get('section'))->pluck('qid')->toArray();
    if($this->addapt==true){
      if($this->session->has('result')){
          $result=$this->session->get('result');
      }
      else{
        $result = 'f';
      }
      if(!$this->session->has('dif')) $this->session->put('dif','e');
      $array= $this->addaptObj->getArray($this->session->get('dif'),$result);

    }
    if(count($exclude)!=0){
      $array = array_diff($array,$exclude);
      if(count($array)==0) return false;
    }
    $string=array_rand($array);
    $this->data = $array[$string];

    if($this->data){
      $this->store($this->session);
      return $this->data;
    }
    else return false;
  }

  /**
   *
   *
   * @var array return the
   */

  private function store(){
    if($this->session->has('qid_array')){
      $qid_array = $this->session->get('qid_array');
    }
    else{
      $qid_array = [];
    }
      $qid_array[]=$this->data;
      $this->session->put('qid_array',$qid_array);
      $this->session->put('qid',$this->data);
    }

  }

  ?>

<?php
namespace App\Http\Controllers;
use App\Model\Session;
use \App\Model\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Helper\LevelIndicaterArray;
use App\Helper\RandomKeyGenerater;
use App\Helper\AdaptiveHendler;
use App\Helper\SectionArray;


  class ExamController extends Controller{

    public function __construct(){
    $this->middleware('auth');
  }
  public function start(Request $request){
    //ALGORITH TO Start Exam
    if ( $request->session()->has('sess_id') && $request->session()->has('section') && $request->session()->has('qid')) {
        return redirect('/practice/exam/next');
    }
    else {
      $gen =new RandomKeyGenerater;
      //storing Exam session id in session variable
      $request->session()->put('sess_id',$gen->sessKeyGen());
      return redirect('/practice/exam/preference');
    }

    // Start main session and redirect to preference section
    // Start Exam session having 4 Section
  }
  public function next(Request $request){
    // submit All requests here
    if(url()->previous()==url("/practice/exam/instructions")){

      $sid=$request->session()->get('section');
      $section=\App\Model\Section::find($sid);
      $request->session()->put('time',$section->time_taken);

      // Plucking the qid array in array variable
      $array=\App\Model\Questions::where('sec_id','=',$sid)->pluck('qid')->toArray();
      $rand=\App\Helper\RandomNumber::fromArray($array);
      if(!$rand){
        return redirect('/practice/exam/switch');
      }
      $request->session()->put('qid',$rand);
      $new = [];
      $new[]=$rand;
      $request->session()->put('qid_array',$new);
      // $request->session()->put('qid','1');
      return redirect('/practice/exam/question');
    }
    else{
      $this->store($request);
      // $perform_action = ;
      if($this->changeQuestion($request) == false) return redirect('/practice/exam/switch');
      else{
        $sid=$request->session()->get('section');
        $db=\App\Helper\SectionArray::getRef($sid);

        // Plucking the qid array in array variable
        $qid_array=$request->session()->get('qid_array');
        $array=\App\Model\Questions::where('sec_id','=',$sid)->pluck('qid')->toArray();

        //Randomize the Question
        $rand=\App\Helper\RandomNumber::fromArray($array,$qid_array);

        // Switch the section if no rendom variable left
          if(!$rand){
            return redirect('/practice/exam/switch');
          }

          // store the random no to qid and qid_array
          else{
            $qid_array[]=$rand;
              $request->session()->put('qid_array',$qid_array);
              $request->session()->put('qid',$rand);
              return redirect('/practice/exam/question');
          }
      }

    }
  }
  /**
   * Change the question No.
   * @param $request
   */
  private function changeQuestion($request){
    // store the section id in Session
    $section = \App\Model\Section::find($request->session()->get('section'));
    // add increment to the question count
    $request->session()->put('count',$request->session()->get('count')+1);

     return SectionArray::checkAvalibilty($request->session()->get('section'),$request);

  }
  /**
   * Store the Question to Session Datatable
   * @param $request
   */
  private function store($request){
    $sec_id= $request->session()->get('section');
    $val = new \App\Helper\GMAT\StoreData;
    $function=strtolower(SectionArray::getRef($sec_id));
    $val->$function($request);
  }
  /**
   * Fetch the Instruction of Every Section from Database
   * @param $request
   */
  public function instructions(Request $request){
    // get Section Table Attributes
    $page = \App\Model\Section::find($request->session()->get('section'));

    return view('page.page-instruction')->with([
      'page'=>$page,
      'heading'=>strtoupper($request->session()->get('exam')),
    ]);
  }
  /**
   * Chosse the Preferences for the Order of Question Paper
   * @param $request
   */
  public function preference(Request $request){
      if ($request->isMethod('post')) {
        if(url()->previous()==url("/practice")){
            $gen =new RandomKeyGenerater;
            $request->session()->put('sess_id',$gen->sessKeyGen());
        }
      $array=$request->toArray();
      $preference= explode(',',$array['preference']);
      $request->session()->put('exam',$array['exam']);
      $request->session()->put('preference',$preference);
      $request->session()->put('section',$preference[0]);
      $request->session()->put('count','1');
      // var_dump();
      // \var_dump($array);
      return redirect('/practice/exam/instructions');
      }
      else{
        // $data = \App\Model\Section::all();
        // return view('page.page-preference')->with([
        //   // 'data'=>$data,
        //   'title'=>'Preferences',
        // ]);
        $data= new \App\Helper\GMAT\Arrangement;
        return view('page.page-preference')->with([
          // 'data' => json_decode($data->order()),
          // "data" => new \App\Helper\GMAT\Arrangement,
          'title'=>'Preferences',
        ]);
      }
  }
  public function switch(Request $request)
  {
      if($request->session()->has('section')) {
        SectionArray::switch($request);
        if(sizeof($request->session()->get('preference'))!=0){
            return redirect('/practice/exam/instructions');
        }
        else{
          return redirect('/practice/exam/end');
        }
      }
      else{
        return redirect('/practice/exam/end');
      }
  }
  public function end(Request $request) {
      if($request->session()->has('sess_id')){
          $session = $request->session()->get('sess_id');
          $request->session()->put('last_sess' ,$session);
          $request->session()->forget('sess_id');
      }
      if($request->session()->has('exam'))$request->session()->forget('exam');
      if($request->session()->has('preference'))$request->session()->forget('preference');
      if($request->session()->has('qid'))$request->session()->forget('qid');
      if($request->session()->has('count'))$request->session()->forget('count');
      if($request->session()->has('section'))$request->session()->forget('section');
      if($request->session()->has('qid_array'))$request->session()->forget('qid_array');
      if($request->session()->has('time'))$request->session()->forget('time');
      return redirect('/practice/exam/result');
  }
  public function test(Request $request){
    $easy=[
      '1',
    ];
    $medium=[
      '2',
    ];
    $hard=[
      '3',
    ];
    $attemted=[
      '4',
      '5',
      '6',
    ];

    $easyAttempt = array_intersect($easy,$attemted);
    $easyUnattempt=array_diff($easy,$easyAttempt);

    $mediumAttempt = array_intersect($medium,$attemted);
    $mediumUnattempt=array_diff($medium,$mediumAttempt);

    $hardAttempt = array_intersect($hard,$attemted);
    $hardUnattempt=array_diff($hard,$hardAttempt);

    $allunattempted=array_unique(array_merge(array_merge($easyUnattempt,$mediumUnattempt),$hardUnattempt));
    // try{
    //     echo $allunattempted[array_rand($allunattempted)];
    // }
    // catch(\Exception $e){
    //   report($e);
    //   return 'false';
    // }
    echo date("h:i:s",( strtotime('12:45:00') - strtotime('11:00:00') ) / 60);

  }

}

<?php
namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Score;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{
  /**
   *
   */
// \App\Helper\SectionArray::getID(strtoupper($db))
  public function index($db){
    $data = \App\Model\Session::where('sec_id','=','2')->get();
    // $opr = \App\Model\Session::where('result','=','t')->get();
    // if(count($opr)!=0) \App\Model\Session::where('result','=','t')->delete();
      $db = strtoupper($db);
      return view('dashboard.review.aw')->with([
        'title'=> \App\Algorithm\Questions\Section::getSection($db).' Section Review',
        'data'=> $data,
        'section'=>\App\Helper\SectionArray::getNameFromRef($db),
        'db'=>$db
      ]);
      foreach ($data as $value) {
        var_dump($value->question['title']);
      }

  }
  public function change(Request $request){

    $data=$request->all();
    $result='p';
    if($data['score']==0){
      $result='f';
    }
    $session =\App\Model\Session::where('refid','=',$data['refid'])->firstorfail();
    $store= \App\Model\Session::where('refid','=',$data['refid'])->update([
      'result'=> $result,
      // 'score'=>$data['score'],
    ]);
    Mail::to($session->user->email)->send(new Score($data));
    return redirect('dashboard/review/'.strtolower($data['db']));
  }
}

 ?>

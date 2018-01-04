<?php
namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 *
 */
class ReviewController extends Controller
{
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
    $store= \App\Model\Session::where('refid','=',$data['refid'])->update([
      'result'=> $data['status'],
    ]);
    return redirect('dashboard/review/'.strtolower($data['db']));
  }
}

 ?>

<?php
namespace App\Http\Controllers;
use App\Model\IntegratedReasoning;
use App\Model\Session;
use \App\Model\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Helper\LevelIndicaterArray;
use App\Helper\RandomKeyGenerater;
use App\Helper\AdaptiveHendler;

class QuestionController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if ($request->session()->has('qid')) {
          // $var = new ;
          $section = \App\Model\Section::find($request->session()->get('section'));
          $data =   \App\Model\Questions::find($request->session()->get('qid'));
            $attach = [
              "title"=>'Question',
              'heading'=>strtoupper($request->session()->get('exam')),
              "qno" => $request->session()->get('count'),
              "aq"=> $section->no_of_q,
              "section" => $section->sec_ref,
              "page" => $data,
              "request" => $request,
              "id" => Auth::id(),
              "auth" => Auth::check(),
              "gt"=> $request->session()->get('time'),
            ];
          return view('page.page-question')->with($attach);
    }
    else {
      return redirect('/');
    }
  }
}

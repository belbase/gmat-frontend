<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ResultController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }
  public function index(Request $request){
    if($request->session()->has('last_sess')){
      $session = $request->session()->get('last_sess');
      $heading=$request->session()->get('exam');
      $result = \App\Model\Session::where('sid','=',$session)->orderBy("attempt_on")->get();
      $request->session()->forget('last_sess');
      $request->session()->forget('exam');
      if($result->count()==0){
        return redirect('/');
      }
      else{
        return view('page.page-result')->with([
          'heading'=>"Result",
          'title'=>'Result',
          'result'=>$result,
        ]);
      }
    }
    else{
      return redirect('/');
    }
  }
}

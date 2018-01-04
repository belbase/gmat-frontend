<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\IntegratedReasoning;
use \App\Model\Page;
class DefaultController extends Controller{


  public function __construct(){
    $this->middleware('auth');
  }
  public function index(){
    // $data= Page::where('uri','=',$_SERVER['REQUEST_URI'])->firstorfail();
    // return view('page.page-index')->with([
    //   'page'=>$data,
    //   "id" => Auth::id(),
    //   "auth" => Auth::check(),
    // ]);
    return redirect('/practice');
  }
  public function logout(Request $request) {
    // if($request->session()->any())
  $request->session()->flush();
  Auth::logout();
  // return redirect('/login');
}
}

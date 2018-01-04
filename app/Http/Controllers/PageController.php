<?php
namespace App\Http\Controllers;

/**
 *
 */
class PageController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function page()
  {
    return view('page.page-default')->with([
      'title'=>'Do Practice of Relavent Sections',
    ]);
  }
}

 ?>

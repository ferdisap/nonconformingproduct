<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dpl;
use App\View\Components\User\Dashboard\DashboardIndex;
use App\View\Components\User\Dashboard\Dpls\Show;
use DateTime;
use Illuminate\Support\Facades\Auth;

class DplController extends Controller
{

  public $model = 'Dpl';
  public $compName = 'Index'; // Index ini diambil dari current urlnya, dashboard/"dpls-index"/{}

  // public $view = view('components.user.dashboard.dpls.index');

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return 'foobar';
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Dpl $noDPL)
  {
    // return $noDPL->creator_id == Auth::user()->id ? $noDPL : 'foo';
    // return Auth::user()->id;
    // return $noDPL->creator_id == Auth::user()->id ? 'foo' : 'bar';
    $view = new DashboardIndex();
    $view->model['className'] = $this->model;

    if (request()->ajax()){
      $view->isAsync = true;
      $this->compName = 'Show';
      $view->subCompName['className'] = $this->compName;
      $view->subCompName['data'] = $noDPL->creator_id == Auth::user()->id ? $noDPL : abort(404);
      return $view->render();
    }

    $componentName = 'components-user-dashboard-dpls-show'; //will be render into dashboard content
    $view->subCompName['className'] = $this->compName;
    $view->subCompName['componentNameForContent'] = $componentName;
    $view->subCompName['data'] = $noDPL->creator_id == Auth::user()->id ? $noDPL : abort(404);
    return $view->render();
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}

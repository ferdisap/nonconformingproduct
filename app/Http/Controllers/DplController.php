<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dpl;
use App\View\Components\User\Dashboard\DashboardIndex;
use App\View\Components\User\Dashboard\Dpls\Show;
use DateTime;

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
    $view = new DashboardIndex();
    $view->model['className'] = $this->model;

    if (request()->ajax()){
      $view->isAsync = true;
      $this->compName = 'Show';
      $view->subCompName['className'] = $this->compName;
      return $view->render();
    }

    $componentName = 'components-user-dashboard-dpls-show'; //will be render into dashboard content
    $view->subCompName['className'] = $this->compName;
    $view->subCompName['componentNameForContent'] = $componentName;
    return $view->render();


    // return view('components.dashboard.user.dpls.detail');
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

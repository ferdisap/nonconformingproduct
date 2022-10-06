<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Dpl;

class DashboardIndex extends Component
{
  public $subCompName;
  public $dpls;
  static $hitung = 0;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(String $subCompName = null)
  {
    $this->subCompName = $subCompName;
    $this->dpls = Dpl::where('creator_id','=',1)->paginate(10);
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {

    return view('components.dashboard.dashboard-index', [
      'componentName' => 'components-dashboard-' . $this->subCompName,
    ]);
  }

  public function preRender(String $subCompName)
  { 
    
    if (request()->ajax == true){
      // return "<div>test</div>";
      // return $subCompName;
      // return request()->page;
      self::$hitung++;
      $subCompName = str_replace('-','.',$subCompName);
      return view('components.dashboard.' . $subCompName,[
        'dpls' => $this->dpls,
        'hitung' => self::$hitung,
      ])->render();
    }
    
    $this->subCompName = $subCompName;
    return $this->render();
  }
}

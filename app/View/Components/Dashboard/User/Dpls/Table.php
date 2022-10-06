<?php

namespace App\View\Components\Dashboard\User\Dpls;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Dpl;

class Table extends Component
{

  public $dpls;
  static $hitung = 0;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($page=1)
  {
    self::$hitung = $page;
    $this->dpls = Dpl::where('creator_id','=',Auth::user()->id)->paginate(10);
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    self::$hitung++;
    return view('components.dashboard.user.dpls.table',[
      'dpls' => $this->dpls,
      'hitung' => self::$hitung,
    ]);
  }
}

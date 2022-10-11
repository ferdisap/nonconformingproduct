<?php

namespace App\View\Components\User\Dashboard\Dpls;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Dpl;

class Table extends Component
{

  public $dpls;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($page=1)
  {
    $this->dpls = Dpl::where('creator_id','=',Auth::user()->id)->with('category:id,code')->paginate(10);
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.user.dashboard.dpls.table',[
      'dpls' => $this->dpls,
    ]);
  }
}

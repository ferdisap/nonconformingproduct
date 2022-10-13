<?php

namespace App\View\Components\User\Dashboard\Dpls;

use Illuminate\View\Component;

class Show extends Component
{

  public $data;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data = null)
    {
      $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.dashboard.dpls.show', [
          'data' => $this->data,
        ]);
    }

    public function setData($data){
      $this->data = $data;
    }
}

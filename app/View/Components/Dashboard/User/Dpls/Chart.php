<?php

namespace App\View\Components\Dashboard\User\Dpls;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Chart extends Component
{  
  public $title = 'DPL Quantity';
  public $labelX;
  public $labelY;
  public $label; // hanya untuk dump label x dan Y. Bukan label(title) untuk chart


  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    $this->labelChart();
    return view('components.dashboard.user.dpls.chart', 
    [
      'title' => $this->title,
      'labelX' => $this->labelX,
      'labelY' => $this->labelY,
      'label' => $this->label,
    ]
    );
  }

  public function labelChart()
  {
    $result = DB::table('dpls')
    ->where('creator_id', '=', Auth::user()->id)
    ->get(['noDpL','published_at']);
  
    $dpls = [];
    foreach ($result as $obj){
      array_push($dpls, json_decode(json_encode($obj), true));
    }
  
    $dplsEditted = [];
    foreach ($dpls as $dpl){  
      $trimmed = substr($dpl['published_at'], 0, 7);
      unset($dpl['published_at']);
      $dpl['published_at'] = $trimmed;
      array_push($dplsEditted, $dpl);
    }
  
    $grouped = collect($dplsEditted)->mapToGroups(function ($item, $key) {
      return [$item['published_at'] => $item['noDPL']];
    });
  
    $label = [];
    foreach ($grouped as $index => $value){
      $label += [$index => count(json_decode(json_encode($value))) ];
    }
    ksort($label);

    $labelX = [];
    $labelY = [];
    foreach ($label as $key => $value){      
      array_push($labelX, $key);
      array_push($labelY, $value);
    }
    $this->labelX = join(',',$labelX);
    $this->labelY = join(',', $labelY);
    $this->label = $label;
  }
}

<?php

namespace App\View\Components\User\Dashboard;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use voku\helper\HtmlMin;
use App\Models\Dpl;
use App\Http\Controllers\DplController;
use App\Models\DplCategory;
use App\Models\User;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Str;
use App\View\Components\User\Dashboard\Dpls\Table;

class DashboardIndex extends Component
{
  public $subCompName = [
    'className' => 'foo',
  ];
  public Bool $isAsync = false;
  public $model = [
    'className' => 'foo',
    'data' => 'bar',
    // 'isDetail' => false,
    // 'primaryKey' => null,
  ];
  public Bool $isPaginate = false;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(String $subCompName = null)
  {
    // $this->subCompName['className'] = $subCompName;
    // $this->dpls = Dpl::where('creator_id','=',1)->paginate(10);
    // $this->dpls = Dpl::where('creator_id','=',1)->get();
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    // render halaman dpls-index dengan async, bukan untuk detail halaman Problem Log
    if ($this->isAsync == true) {
      $this->isAsync = false;

      // SELESAI
      if ($this->isPaginate == true){
        $this->isPaginate == false;

        $htmlMin = new HtmlMin();
        $comp = new ("App\View\Components\User\Dashboard\\". Str::of($this->model['className'])->plural() ."\\" . $this->subCompName['className']);
        $view = $htmlMin->minify($comp->render());
        return $view;
      }

      $htmlMin = new HtmlMin();
      $comp = new ("App\View\Components\User\Dashboard\\". Str::of($this->model['className'])->plural() ."\\" . $this->subCompName['className']);
      $view = $view = $htmlMin->minify($comp->render());
      // $view = $comp->render();
      return $view;
      // return $this->model['className'];

      // $subCompName = str_replace('-','.',$this->subCompName['className']); // mengubah dpls-index menjadi dpls.index
      // return $subCompName;
      // $html = view('components.user.dashboard.' . $subCompName,[
      //   'dpls' => $this->dpls,
      // ]);
      // return $htmlMin->minify($html->render());
    }

    // render halaman user-dpls-index, tapi BUKAN async
    return view('components.user.dashboard.dashboard-index', [
      'componentName' => 'components-user-dashboard-' . Str::of(strtolower($this->model['className']))->plural() . '-' .strtolower($this->subCompName['className']),
    ]);
  }

  /**
   * Filter the request route to switch the view.
   *
   */
  public function preRender(String $subCompName, String $modelPrimaryKey = null)
  {

    //take the first word (model) of the $subCompName(ex: "dpls-index" menjadi "Dpl")
    $model = Str::of(ucfirst(explode("-", $subCompName)[0]))->singular(); // from model (settings-profile) menjadi (Settings), kemudian dari plural menjadi singular (Settings menjadi Setting)
    
    //take the last word (component) of the $subCompName(ex: "dpls-table" menjadi "Table")    
    $arr = explode("-", $subCompName);
    $comp = ucfirst(end($arr)); // from component (settings-profile) menjadi (Profile)

    $this->model['className'] = $model;
    $this->subCompName['className'] = $comp;


    // SET $this->model['data'] = $data; hanya untuk retrive model database by $primary

    if ($modelPrimaryKey) {
      try {
        // prepare the string for getting findOrFile the $modelPrimary Key,
        $eval = "App\Models\\" . $model . "::findOrFail('" . $modelPrimaryKey . "');";
        $data = eval('return ' . $eval); // retrun sebuah Model berdasarkan primarykey nya
        
        $this->model['data'] = $data;
      } catch (\Throwable $th) {}
    }

    if (request()->ajax == true) {
      $this->isAsync = true;
      if (request()->page == true){      
        $this->isPaginate = true;        
        // $this->model['data'] = $data;
      }
    }
    
    return $this->render();
  }
}

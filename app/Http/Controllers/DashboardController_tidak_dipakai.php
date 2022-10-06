<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use voku\helper\HtmlMin;
// // use App\Http\Livewire\User\Dpls\Index;
// use App\Http\Livewire\User\Settings\Profile;
// use App\Http\Livewire\User\Settings\Usernameandpassword;

class DashboardController extends Controller
{

    public function index(){
      return view('dashboard.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function content(String $component)
    {
      $comp = str_replace('-','.',$component);
      $template = str_replace(" ", "\\", ucwords(str_replace("-"," ",$component))); // mengganti dari user-dpls-index menjadi User\Dpls\Index
      $path = "App\Http\Livewire\\" . $template;
      return view('livewire.'.$comp,[
        'component' => $comp,
        'view' => (new $path())->render(),
      ]);
      // return view('livewire.user.dashboard',[
      //   'component' => $comp,
      //   'view' => (new $path())->render(),
      //   // 'view' => 'user.dashboard',
      // ]);
    }

    // public function showContent(String $component)
    // {
    //   // $template = str_replace("-","\\",$component); //ini berhasil juga, tapi ini tidak case sensitive
    //   $template = str_replace(" ", "\\", ucwords(str_replace("-"," ",$component))); // mengganti dari user-dpls-index menjadi User\Dpls\Index
    //   // return $template;
    //   $path = "App\Http\Livewire\\" . $template;
    //   // return $path;
    //   $instance = new $path();
    //   return $instance->render();

    // }
}

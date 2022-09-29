<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Http\Livewire\User\Setting;

class Dashboard extends Component
{
  public function render()
  {
    return view('livewire.user.dashboard');
  }

  public function setting()
  {
   $setting = new Setting();
   return $setting->render();
  // return "console.log('test')";
  
  }

  public function redirectPage()
  {
    return redirect('/');
  }
}

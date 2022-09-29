<?php

namespace App\Http\Livewire\User\Dpls;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Table extends Component
{
  public $dpls;

  public function mount()
  {
    return $this->fill([
      'dpls' => User::find(Auth::user()->id)->dplCreator,
      // 'dpls' => Auth::user()->id,
    ]);
  }

  public function render()
  {
    return view('livewire.user.dpls.table');
  }
}

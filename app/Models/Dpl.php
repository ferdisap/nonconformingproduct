<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpl extends Model
{
    use HasFactory;

    // protected $primaryKey = "noDPL";
    protected $guarded = ['noDPL'];

    public function creator()
    {
      return $this->belongsTo(User::class, 'creator_id');
    }
}

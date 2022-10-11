<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpl extends Model
{
    use HasFactory;

    protected $primaryKey = "noDPL";
    // protected $primaryKey = "id";
    // protected $primaryKey = "slug";
    protected $guarded = ['id'];

    public function creator()
    {
      return $this->belongsTo(User::class, 'creator_id');
    }

    public function category()
    {
      return $this->belongsTo(DplCategory::class, 'category_id');
    }

    public function getRouteKeyName()
    {
      return 'noDPL';
    }
}

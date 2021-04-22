<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = ["tag"];

    public $timestamps = FALSE;

    public function ads()
    {
        return $this->belongsToMany(Ad::class, "ad_category");
    }
}

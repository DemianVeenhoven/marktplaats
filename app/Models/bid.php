<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ad;

class bid extends Model
{
    use HasFactory;

    protected $fillable = ["bid", "bidder", "ad_id"];

    public function ads()
    {
        return $this->belongsTo(Ad::class);
    }
}

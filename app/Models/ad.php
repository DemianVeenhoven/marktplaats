<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bid;

class ad extends Model
{
    use HasFactory;

    protected $fillable = ["seller", "title", "body", "premium_ad", "image_path"];

    public function bids()
    {
        return $this->hasMany(Bid::class)->orderBy("bid", "DESC");
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, "ad_category");
    }
}

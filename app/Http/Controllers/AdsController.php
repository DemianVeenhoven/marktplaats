<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Bid;
use App\Http\Requests\StoreAdRequest;
use App\Http\Requests\StoreAdStatusRequest;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::orderBy("premium_ad", "DESC")->orderBy("created_at", "DESC")->where("sold" , 0)->get();
        $categories = Category::all();
        $compact = compact("ads", "categories");

        return view("ads/index", $compact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        
        return view("ads/create", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Ad $ad, StoreAdRequest $request)
    {
        $categories = request()->get("category_id");

        $ad = new \App\Models\Ad;
        $ad->fill($request->validated());
        $ad->save();
        $ad->categories()->sync($categories);

        return redirect("/ads");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        $categories = Category::all();

        return view("ads/edit", ["ad" => $ad], ["categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Ad $ad, StoreAdRequest $request)
    {
        $ad->update($request->validated());

        return redirect("ads/myAds");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect("ads/myAds");
    }

    public function myAds()
    {
        $user = auth()->user();
        if($user->fees->isEmpty()) {
            $ads = $user->ads;
        } else {
            $ads = $user->fees;
        }
        
        $categories = Category::all();
        $compact = compact("ads", "categories");

        return view("ads/my_ads", $compact);
    }

    public function sort(Request $request)
    {
        $ids = $request->category_ids;
        
        $ads = Ad::whereHas('categories', function (Builder $query) use ($ids) {
            $query->whereIn('categories.id', $ids);
        })->orderBy("created_at", "DESC")->get();

        $categories = Category::all();
        $compact = compact("ads", "categories");
        
        return view("ads/index", $compact);
    }

    public function update_ad_status(Ad $ad, StoreAdStatusRequest $request)
    {
        $ad->update($request->validated());

        return redirect("ads/myAds");
    }
}

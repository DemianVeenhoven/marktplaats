<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Bid;
use App\Http\Requests\StoreBidRequest;

class AdsBidsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Bid $bid, StoreBidRequest $request)
    {
        $bid->create($request->validated());

        return redirect("/ads");
    }
}

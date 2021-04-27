@extends ("app")

@section ("style")
	<link href="/css/ads.css" rel="stylesheet" />
@endsection ("style")


@section ("content")
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>Ads</h2>
                </div>
                <br>
                <br>

                <div class="ads">
                    @forelse ($ads as $ad)
                        @if ($ad->premium_ad == 0)
                            <div class="ad">
                        @else
                            <div class="premium">
                        @endif

                            <p class="ad_title">{{ $ad->title }}</p>
                            <br>
                            <br>

                            <p>{{ $ad->body }}</p>
                            <br>
                            <br>

                            <p>Placed by: {{$ad->seller}}</p>
                            <br>
                            <br>

                            <p>Placed on: {{$ad->created_at}}</p>
                            <br>
                            <br>

                            <p class = "categories">Tags:</p>
                            @forelse ($ad->categories as $category)
                                <div class = "categories">
                                    <p>{{ $category->tag }}</p>
                                </div>
                            @empty
                                <p>This ad has no tags.</p>
                            @endforelse
                            <br>

                            @forelse ($ad->bids as $bid)
                                <div class = "bid">
                                    <p>€ {{ number_format($bid->bid,2,'.','') }} | By: {{ $bid->bidder }} | Placed on: {{ $bid->created_at }}</p>
                                </div>
                                <br>
                            @empty
                                <p>Your ad has no bids yet.</p>
                            @endforelse
                            

                            <button style = "float:centre"><a href="{{ route('ads.edit', $ad->id) }}">Edit</a></button>
                            <br>
                            <br>

                            @if ($ad->premium_ad == 0 && $ad->sold == 0)
                                <form method = "POST" action = "/ads/{{ $ad->id }}/update_ad_status">
                                    @csrf
                                    @method ("PUT")

                                    <input name = "premium_ad" type = "hidden" value = "1">

                                    <button type = "submit">Upgrade ad to premium</button>
                                </form>
                            @endif
                            <br>
                            <br>


                            @if ($ad->sold == 0)
                                @if ($ad->bids->isEmpty() || $ad->bids[0]->bid <= 500.00)
                                    <form method = "POST" action = "/ads/{{ $ad->id }}/update_ad_status">
                                        @csrf
                                        @method ("PUT")

                                        <input name = "sold" type = "hidden" value = "1">

                                        <button type = "submit">Mark ad as sold</button>
                                    </form>
                                @else
                                    @php
                                        $highestBid = $ad->bids[0]->bid;
                                        $fee = number_format($highestBid * 0.05,2,'.','');
                                    @endphp
                                    <form method = "POST" action = "/ads/{{ $ad->id }}/update_ad_status">
                                        @csrf
                                        @method ("PUT")

                                        <input name = "sold" type = "hidden" value = "1">
                                        <input name = "fee" type = "hidden" value = "{{ $fee }}">

                                        <button type = "submit">Mark ad as sold</button>
                                    </form>
                                @endif   
                            @elseif ($ad->fee > 0.00)
                                <form method = "POST" action = "/ads/{{ $ad->id }}/update_ad_status">
                                    @csrf
                                    @method ("PUT")
                                    <p>Your fee is {{ $ad->fee }}</p>
                                    
                                    <input name = "fee" type = "hidden" value = "0.00">

                                    <button type = "submit">Pay outstanding fee</button>
                                </form>
                            @else
                                <form method = "POST" action = "/ads/{{ $ad->id }}">
                                    @csrf
                                    @method ("DELETE")
                                        
                                    <button type = "submit">Delete</button>
                                </form>
                            @endif
                            <br>
                            <br>
                            
                            
                            <br>

                        </div>
                        <br>
                    @empty
                        <p>You have not placed any ads yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection ("content")
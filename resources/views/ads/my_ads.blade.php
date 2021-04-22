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
                    @foreach ($ads as $ad)
                        <div class="ad">
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
                            @foreach ($ad->categories as $category)
                                <div class = "categories">
                                    <p>{{ $category->tag }}</p>
                                </div>
                            @endforeach
                            <br>

                            @foreach ($ad->bids as $bid)
                                <div class = "bid">
                                    <p>€ {{ number_format($bid->bid,2,'.','') }} | By: {{ $bid->bidder }} | Placed on: {{ $bid->created_at }}</p>
                                </div>
                                <br>
                            @endforeach

                            <button style = "float:centre"><a href="{{ route('ads.edit', $ad->id) }}">Edit</a></button>
                            <br>
                            <br>

                            <button style = "float:centre"><a href="{{ route('ads.premium', $ad->id) }}">Upgrade ad to premium</a></button>
                            <br>
                            <br>

                            <form method = "POST" action = "/ads/{{ $ad->id }}">
                                @csrf
                                @method ("DELETE")
                                    
                                <button type = "submit">Delete</button>
                            </form>
                            <br>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection ("content")
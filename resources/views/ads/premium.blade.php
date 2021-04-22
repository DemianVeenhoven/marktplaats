@extends ("app")

@section ("content")
    <div id="wrapper">
		<div id="page" class="container">
			<div id="content">
				<div class="title">
					<h2>Upgrade ad to premium</h2>
				</div>
                <div>
                    <form method = "POST" action = "/ads/{{ $ad->id }}/premium_update" enctype = "multipart/form-data">
                        @csrf
                        @method ("PUT")

                        <input name = "premium_ad" type = "hidden" value = "1">

                        <button type = "submit">Upgrade</button>
                    </form>
                    <!-- for debugging -->
                    <form method = "POST" action = "/ads/{{ $ad->id }}/premium_update" enctype = "multipart/form-data">
                        @csrf
                        @method ("PUT")

                        <input name = "premium_ad" type = "hidden" value = "0">

                        <button type = "submit">Downgrade</button>
                    </form>

                    <p>{{ $ad->premium_ad }}</p>
                </div>
            <div>
        </div>
    </div>
@endsection ("content")
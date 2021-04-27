@extends ("app")

@section ("script")
	<script src="/js/ajax.js"></script> 
@endsection ("script")

<div id = "ajax">
	@section ("style")
		<link href="/css/ads.css" rel="stylesheet" />
	@endsection ("style")


	@section ("content")
		@guest
			<div id="wrapper">
				<div id="page" class="container">
					<div id="content">
						<div class="title">
							<h2>Ads</h2>
						</div>

						<label>Filter<label>
						<br>
						<form method="POST" id="filterForm">
							@csrf

							@forelse($categories as $category)
								<input type="checkbox" name="category_ids[]" value="{{ $category->id }}">{{ $category->tag }}
							@endforeach
							<br>
							<button type="button"  onclick="sort()">Sort</button>
						</form>
						<button type="button"  onclick="reset()">Reset</button>
						<br>
						<br>

						<div class = "ads">
							@forelse ($ads as $ad)
								<div class = "ad">
									<p class = "ad_title">{{ $ad->titel }}</p>
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
								</div>
								<br>
							@empty
								<p>There are no ads.</p>
							@endforelse
						</div>
					</div>
				</div>
			</div>
		@endguest

		@auth
			<div id="wrapper">
				<div id="page" class="container">
					<div id="content">
						<div class="ad_title">
							<h2>Ads</h2>
						</div>

						<label>Filter<label>
						<br>
						<form method="POST" id="filterForm">
							@csrf

							@foreach($categories as $category)
								<input type="checkbox" name="category_ids[]" value="{{ $category->id }}">{{ $category->tag }}
							@endforeach
							<br>
							<button type="button"  onclick="sort()">Sort</button>
						</form>
						<button type="button"  onclick="reset()">Reset</button>
						<br>
						<br>

						<div class="ads">
							@forelse ($ads as $ad)
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
										<p>No bids have been placed on this ad.</p>
									@endforelse

									@if ($ad->seller !== auth()->user()->name)
										<form method = "POST" action = "/ads/{{ $ad->id }}/bids">
											@csrf

											<input name = "ad_id" type = "hidden" value = "{{ $ad->id }}">
											<input name = "bidder" type = "hidden" value = "{{ auth()->user()->name }}">

											<label>Your bid:</label>
											<br>
											<label>€</label>
											<input name = "bid" pattern="^\d*(\.\d{0,2})?$" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
											<br>

											<button type = "submit">Bid</button>
										</form>
									@endif
								</div>
								<br>
							@empty
								<p>There are no ads.</p>
							@endforelse
						</div>
					</div>
				</div>
			</div>
		@endauth
	</div>
@endsection ("content")
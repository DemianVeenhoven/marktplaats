@extends ("app")

@section ("content")
    <div id="wrapper">
		<div id="page" class="container">
			<div id="content">
				<div class="title">
					<h2>Ads</h2>
				</div>
                <div>
                    <form method = "POST" action = "/ads" enctype = "multipart/form-data">
                        @csrf

                        <input name = "seller" type = "hidden" value = "{{ auth()->user()->name }}">

                        <label>Title</label>
                        <br>
                        <input name = "title" value = "{{ old('title') }}" patern = ".{3,}" required>
                        <br>
                        <br>

                        <label>Body</label>
                        <br>
                        <textarea name = "body">{{ old('body') }}</textarea>
                        <br>
                        <br>

                        <label>Tags:
                        <br>
                        @foreach ($categories as $category)
                            <input type = "checkbox", name = "category_id[]", value = "{{ $category->id }}">{{ $category->tag }}
                        @endforeach
                        <br>
                        <br>

                        <button class = "button"><a href = "{{ route('categories.create') }}">Create a new tag</a></button>
                        <br>
                        <br>

                        <button class = "button" type = "submit">Create</button>
                    </form>
                </div>
            <div>
        </div>
    </div>
@endsection ("content")
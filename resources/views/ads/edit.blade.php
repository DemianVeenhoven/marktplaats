@extends ("app")

@section ("content")
    <div id="wrapper">
		<div id="page" class="container">
			<div id="content">
				<div class="title">
					<h2>Edit</h2>
				</div>
                <div>
                    <form method = "POST" action = "/ads/{{ $ad->id }}" enctype = "multipart/form-data">
                        @csrf
                        @method ("PUT")
                        
                        <input name = "user_id" type = "hidden" value = "{{ auth()->user()->id }}">
                        <input name = "seller" type = "hidden" value = "{{ auth()->user()->name }}">

                        <label>Title</label>
                        <br>
                        <input name = "title" value = "{{ $ad->title }}" patern = ".{3,}" required>
                        <br>
                        <br>

                        <label>Body</label>
                        <br>
                        <textarea name = "body">{{ $ad->body }}</textarea>
                        <br>
                        <br>

                        <label>Tags:
                        <br>
                        @foreach ($categories as $category)
                            <input type = "checkbox", name = "category_id[]", value = "{{ $category->id }}">{{ $category->tag }}
                        @endforeach
                        <br>
                        <br>

                        <button type = "submit">Edit</button>
                    </form>
                </div>
            <div>
        </div>
    </div>
@endsection ("content")
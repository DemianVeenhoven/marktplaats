@extends ("app")

@section ("content")
    <div id="wrapper">
	    <div id="page" class="container">
		    <div id="content">
			    <div class="title">
				    <h2>Create new category</h2>
                </div>
			    <div>
                    <form method = "POST" action = "/categories">
                         @csrf

                        <label>Tag name</label>
                        <p>Needs atleast 2 characters</p>
                        <input name = "tag" value = "{{ old('tag') }}" pattern = ".{2,}" required>
                        <br>
                        <br>

                        <button class = "button" type = "submit">Create</button>
                        
                    </form>
			    </div>
		    </div>
	    </div>
    </div>
@endsection ("content")
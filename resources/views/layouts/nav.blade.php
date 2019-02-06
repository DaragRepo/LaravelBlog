    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="/">Home</a>

          @if(Auth::check())

            <a class="nav-link" href="/posts/create">Publish a Post</a>
            <a class="nav-link active ml-auto" href="">{{ Auth::user()->name }}</a>
            <a class="nav-link" href="/logout">Logout</a>

          @else 

            <a class="nav-link active ml-auto" href="/login">Login</a>

    		  @endif
		  
        </nav>
      </div>
    </div>

   
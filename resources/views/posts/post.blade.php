  <div class="blog-post">
    <h2 class="blog-post-title">
      @if($manyPosts)
      <a href="/posts/{{ $post->id }}">
        {{ $post->title }}
      </a>
      @else
      {{ $post->title }}
      @endif

    </h2>

    <p class="blog-post-meta">
      {{ $post->user->name }} on
      {{ $post->created_at->toFormattedDateString() }}
      
      <?php $i = 1 ?>

      @if($count = count($post->tags))

      @foreach($post->tags as $tag) 
        
        <a href="/posts/tags/{{ $tag->name }}">

          @if ($count > 1 &&  $i < $count)  

            {{ $tag->name }},&nbsp

          @else 
        
            {{ $tag->name }}

          @endif  

        </a>

      <?php $i++ ?>

      @endforeach

      @endif

    </p>

    @if($manyPosts)

      {{ str_limit($post->body, $limit = 50) }}
    
    @else 
        {{ $post->body }}

    @endif
    
    <hr>

    <div class="comments">
      <ul class="list-group">
        @foreach ($post->comments as $comment)

        <li class="list-group-item">

          <strong>
            {{  App\User::find($comment->user_id)->name }}
            {{ $comment->created_at->diffForHumans() }}: &nbsp
          </strong>

          {{ $comment->body }}

        </li>

        @endforeach
      </ul>
    </div>

    {{-- Add a Comment --}}
    <hr>
    <div class="card">

      <div class="card-block">

        <form method="POST" action="/posts/{{ $post->id }}/comments">

          <div class="form-group">

            {{ csrf_field() }}

    <textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>

          </div>

          <div class="form-group">

            <button type="submit" class="btn btn-primary">Add Comment</button>

          </div>

        </form>

        @include('layouts.errors')

      </div>
    </div>





  </div><!-- /.blog-post -->

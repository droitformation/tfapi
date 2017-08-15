@foreach($posts as $post)
    <div class="post-arret">
        <h3 class="post-title">
            {{ $post->post_title }}
        </h3>
        <div class="post-content">
            {!! nl2br($post->post_content) !!}
        </div>
    </div>
@endforeach

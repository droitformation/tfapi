@foreach($posts as $post)
    <div class="post-arret" id="{{ $post->ID }}">
        <h3 class="post-title">
            {{ $post->post_title }}
        </h3>
        <h4 class="post-date">
            {{ $post->post_date }}
        </h4>

        <div class="post-content">
            {!! ($post->content) !!}
        </div>
    </div>
@endforeach

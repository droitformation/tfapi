@foreach($posts as $post)
    <div class="post-arret" id="{{ $post->ID }}">
        <h3 class="post-title">{!! $post->title_link !!}</h3>
        <h4 class="post-date">{{ $post->post_date }}</h4>
        <div class="post-content">
            {!! ($post->content) !!}
            <p><strong>{{ $post->meta->auteur }}</strong></p>
        </div>
    </div>
@endforeach

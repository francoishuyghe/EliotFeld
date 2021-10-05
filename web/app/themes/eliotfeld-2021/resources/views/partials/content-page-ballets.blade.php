<div class="container"> 
    @foreach ($ballets as $ballet)
        <div class="ballet">
            <a href="{{ get_permalink($ballet->ID) }}">
                {{ $ballet->post_title }}
            </a>
        </div>
    @endforeach
</div>
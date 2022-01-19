<div class="container"> 
    <header id="balletsHeader" class="row">
            <div class="sort header-name col">Ballets <span class="toggle down"></span></div>
            <div class="sort header-year col-md-1">Public Domain<span class="toggle down"></span></div>
            <div class="sort header-year col-md-1">Year <span class="toggle down"></span></div>
            <div class="sort header-composer col-md-2">Composer <span class="toggle down"></span></div>
    </header>
    @foreach ($ballets as $ballet)
        <div class="ballet row">
            <div class="ballet-name col">
                <a href="{{ get_permalink($ballet->ID) }}">
                    {{ $ballet->post_title }}
                </a>
            </div>
            <div class="ballet-year col-md-1">
                @if(in_category('cat-2', $ballet->ID))
                    <i class="fab fa-creative-commons-pd"></i>
                @endif
            </div>
            <div class="ballet-year col-md-1">
                @php $generalInfo = get_field('general_info', $ballet->ID) @endphp
                @if($generalInfo)
                {{ $generalInfo['year'] }}
                @endif
            </div>
            <div class="ballet-composer col-md-2">
                @php $music = get_field('music', $ballet->ID) @endphp
                @if($music['composer'])
                {{ $music['composer']->post_title }}
                @endif
            </div>
        </div>
    @endforeach
</div>
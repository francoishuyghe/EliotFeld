<article @php post_class() @endphp>
  <div class="container">
    @php $general_info = $data['general_info'] @endphp
  <header>
    <a href="/ballets">Back to all</a>
    <h1 class="entry-title">{!! get_the_title() !!} ({{ $general_info['year'] }})</h1>
  </header>
  <div class="entry-content">
    <h2>General Info</h2>
    @if( $general_info['running_time']) <p>Running Time: {{ $general_info['running_time'] }}min</p> @endif
    <p>This ballet is @if($general_info['running_time']) in @else <b>not in</b> @endif the public domain.</p>

    <h2>Key People</h2>
    @if($data['lighting_designer'])<p>Lighting Designer: {{ $data['lighting_designer']['title'] }}</p>@endif
    @if($data['costume_designer'])<p>Costume Designer: {{ $data['costume_designer']['title'] }}</p>@endif
    @if($data['set_designer'])<p>Set Designer: {{ $data['set_designer']['title'] }}</p>@endif

    <h2>Premiere</h2>
    @php $premiere = $data['premiere'] @endphp
    @if( $premiere['date'])<p>Date: {{ $premiere['date'] }}</p> @endif
    @if( $premiere['location'])<p>Location: {{ $premiere['location'] }}</p> @endif
    @if( $premiere['company'])<p>Company {{ $premiere['company'] }}</p> @endif
    @if( $premiere['cast'])
    <ul>
      @foreach ($premiere['cast'] as $castMember)
      <li>{{ $castMember['title'] }}</li>
      @endforeach
    </ul>
    @endif
    
    @if($data['notes'])
    <h2>Notes</h2>
    {!! $data['notes'] !!}
    @endif
    
    <h2>Music</h2>
    @php $music = $data['music'] @endphp
    @if( $music['composer'])<p>Composer: {{ $music['composer']['title'] }}</p> @endif
    @if( $music['composition'])<p>Composition: {{ $music['composition'] }}</p> @endif
    @if( $music['music_notes'])<h3>Notes</h3> {!! $music['music_notes'] !!} @endif
    
    <h2>Media</h2>
    @php $media = $data['media'] @endphp
    @if( $media['photos'] )
      <div class="row">
        @foreach ($media['photos'] as $photo)
          <div class="col-md-4">
            <img src="{{ $photo['sizes']['medium'] }}" />
          </div>
        @endforeach
      </div>
    @endif

    @if( $media['videos'] )
    <div class="row">
      @foreach ($media['videos'] as $video)
        <div class="col-md-6">
            {!! $video !!}
        </div>
      @endforeach
    </div>
    @endif
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  </div>
</article>

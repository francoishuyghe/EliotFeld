@php $general_info = $data['general_info'] @endphp
@php $music = $data['music'] @endphp
@php $premiere = $data['premiere'] @endphp

<article @php post_class() @endphp>
  <div class="container">
    <div class="col-12">
    <a class="back-button" href="/ballets">Back to ballets</a>
  <header id="balletHeader">
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    <div class="year">{{ $general_info['year'] }}</div>
    @if($music['composer'])<div class="composer">{{ $music['composer']->post_title }}</div>@endif
  </header>
    </div>
  <div class="col-md-6">
  <div class="entry-content">
    <section id="generalSection">
      <p><h3>Choreographer</h3><p>Eliot Feld</p>
      @if($data['lighting_designer'])<h3>Lighting Designer</h3><p>{{ $data['lighting_designer']->post_title }}</p>@endif
      @if($data['costume_designer'])<h3>Costume Designer</h3><p>{{ $data['costume_designer']->post_title }}</p>@endif
      @if($data['set_designer'])<h3>Set Designer</h3><p>{{ $data['set_designer']->post_title }}</p>@endif
      @if( $general_info['running_time']) <h3>Running Time</h3><p>{{ $general_info['running_time'] }} min</p> @endif
    </section>

    {{-- MUSIC --}}
    <section id="musicSection">
      <h2>Music</h2>
      @if( $music['composer'])<h3>Composer</h3><p>{{ $music['composer']->post_title }}</p> @endif
      @if( $music['music_notes'])<h3>Composition</h3> {!! $music['composition'] !!} @endif
      @if( $music['music_notes'])<h3>Notes</h3> {!! $music['music_notes'] !!} @endif
    </section>

    <section id="premiereSection">
      <h2>Premiere</h2>
      <p>
        @if( $premiere['date'])<h3>Date</h3>{{ $premiere['date'] }}<br/> @endif
        @if( $premiere['location'])<h3>Location</h3>{{ $premiere['location'] }}<br/> @endif
        @if( $premiere['company'])<h3>Company</h3>{{ $premiere['company'] }} @endif
      </p>
      
      @if( $premiere['cast'])
      <h3>Premiere Cast</h3>
      <ul class="cast-list">
        @foreach ($premiere['cast'] as $castMember)
        <li>{{ $castMember->post_title }}</li>
        @endforeach
      </ul>
      @endif
    </section>
    
    @if($data['notes'])
    <section id="notesSection">
      <h2>Credits & Notes</h2>
      {!! $data['notes'] !!}
    </section>
    @endif

    @if(in_category('cat-2'))
    <p>The choreography for {!! get_the_title() !!} is in the public domain. 
      If you are interested in viewing the full length video, either for research purposes or for the purpose of staging the ballet, access to full length video(s) may be obtained by request. </p>
      <p>Please note that there are third party rights to be cleared before any public staging of the ballet.</p>
  </div>
</div>

@php $media = $data['media'] @endphp
@if( $media['photos'] || $media['videos'])
<h2>Media</h2>
@endif

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
    @endif

  <footer>
    
  </footer>
  </div>
</article>

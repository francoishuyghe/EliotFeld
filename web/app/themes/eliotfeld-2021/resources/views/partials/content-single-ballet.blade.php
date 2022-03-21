@php $general_info = $data['general_info'] @endphp
@php $music = $data['music'] @endphp
@php $premiere = $data['premiere'] @endphp

<article @php post_class() @endphp>
  <div class="container">
    <a class="back-button" href="/ballets">Back to ballets</a>
    <header id="balletHeader">
      <h1 class="entry-title">{!! get_the_title() !!}</h1>
      <div class="year">{{ $general_info['year'] }}</div>
    </header>

  <div class="row">
      <section class="col-md-4" id="generalSection">
        <h2>Creative Team</h2>
        <p><h3>Choreographer</h3><p>Eliot Feld</p>
        @if($data['lighting_designer'])
          <h3>Lighting Designer</h3>
          <p><a href="{{ the_permalink($data['lighting_designer']) }}">
            {{ get_the_title($data['lighting_designer']) }}
          </a></p>@endif

        @if($data['costume_designer'])
        <h3>Costume Designer</h3>
        <p><a href="{{ the_permalink($data['costume_designer']) }}">
          {{ get_the_title($data['costume_designer']) }}
        </a></p>@endif

        @if($data['set_designer'])
        <h3>Set Designer</h3>
        <p><a href="{{ the_permalink($data['set_designer']) }}">
          {{ get_the_title($data['set_designer']) }}
        </a></p>@endif

        @if( $general_info['running_time']) 
          <h3>Running Time</h3>
          <p>{{ $general_info['running_time'] }} min</p> 
        @endif
      </section>

  <div class="col-md-8">
    <div class="row">
    <div class="col-md-6">
      {{-- MUSIC --}}
      <section id="musicSection">
        <h2>Music</h2>
        @if( $music['composer'])
        <h3>Composer</h3>
        <p>
          @if($music['composer']->ID !== 874)
            <a href="{{ the_permalink($music['composer']) }}">
          @endif
          
          {{ get_the_title($music['composer']) }}

          @if($music['composer']->ID !== 874)
            </a>
          @endif
        </p>
        @endif

        @if( $music['composition'])<h3>Composition</h3> {!! $music['composition'] !!} @endif
        @if( $music['music_notes'])<h3>Notes</h3> {!! $music['music_notes'] !!} @endif
      </section>
    </div>

    <div class="col-md-6">
      <section id="premiereSection">
        <h2>Premiere</h2>
        <p>
          @if( $premiere['date'])<h3>Date</h3>{{ $premiere['date'] }}<br/> @endif
          @if( $premiere['location'])<h3>Location</h3>{{ $premiere['location'] }}<br/> @endif
          @if( $premiere['company'])<h3>Company</h3>{{ $premiere['company'] }} @endif
        </p>
        
        @if( $premiere['cast'])
        <h3>Premiere Cast</h3>
        <ul id="castList" @if (count($premiere['cast']) > 9)class="columned"@endif>
          @foreach ($premiere['cast'] as $castMember)
          <li><a href="{{ the_permalink($castMember) }}">
            {{ get_the_title($castMember) }}
          </a></li>
          @endforeach
        </ul>
        @endif
      </section>
    </div>

    {{-- Notes --}}
      @if($data['notes'])
      <section class="col-md-12" id="notesSection">
        <h2>Credits & Notes</h2>
        {!! $data['notes'] !!}
      </section>
      @endif
    
    {{-- Media --}}
    @php $media = $data['media'] @endphp
    @if( $media['photos'] || $media['videos'])
    <section class="col-12 mediaSection">
      <h2>Media</h2>

      {{-- Photos --}}
      @if( $media['photos'] )
        <div class="row">
          @foreach ($media['photos'] as $photo)
            <div class="col-md-4">
              <img src="{{ $photo['sizes']['medium'] }}" />
            </div>
          @endforeach
        </div>
      @endif

      {{-- Videos --}}
      @if( $media['videos'] )
      <div class="row">
        @foreach ($media['videos'] as $video)
          <div class="col-md-6">
              {!! $video['video'] !!}
          </div>
        @endforeach
      </div>
      @endif
    </section>
    @endif

    {{-- Public Domain Notice --}}
    @if(in_category('cat-2'))
    <section class="col-md-12 public-domain">
      <h3><i class="fal fa-info-circle"></i> Copyright Notice</h3>
      <p>The choreography for {!! get_the_title() !!} is in the public domain. If you are interested in viewing the full length video, either for research purposes or for the purpose of staging the ballet, access to full length video(s) may be obtained by request.</p>
      <p>Please note that there are third party rights to be cleared before any public staging of the ballet.</p>
    </section>
    @endif

    </div>
  </div>
</div>
    
  
  </div>
</article>

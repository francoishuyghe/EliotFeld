<article @php post_class() @endphp>
  <div class="container">
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
  </header>

  <div class="entry-content">
    @php the_content() @endphp
  </div>

  @if (count($ballets) > 0)
  <section id="ballets">
      
      @if(has_term('composer', 'position'))
      <p>{!! get_the_title() !!}'s music was used for:</p>
      @else
      <p>{!! get_the_title() !!} was part of the premiere production of the following ballet(s):</p>
      @endif
      @include('partials.ballets-table')
    </section>
  @endif
  </div>
</article>

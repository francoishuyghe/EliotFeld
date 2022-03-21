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
      <p>{!! get_the_title() !!} has worked on:</p>
      @include('partials.ballets-table')
    </section>
  @endif
  </div>
</article>

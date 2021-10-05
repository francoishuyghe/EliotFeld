<article @php post_class() @endphp>
  <div class="container">
  <header>
    <a href="/ballets">Back to all</a>
    <h1 class="entry-title">{!! get_the_title() !!} ({{ $data['general_info']['year'] }})</h1>
  </header>
  <div class="entry-content">
    
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  </div>
</article>

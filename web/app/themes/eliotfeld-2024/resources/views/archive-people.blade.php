@extends('layouts.app')

@section('content')
  <div class="page-header">
    <div class="container">
    <h1>People</h1>
    </div>
  </div>

  @if (!have_posts())
    <div class="container">
    <div class="alert alert-warning">
      {{ __('Sorry, no people were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  </div>
  @endif

  @while (have_posts()) @php the_post() @endphp
    @include('partials.content-'.get_post_type())
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection

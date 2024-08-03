{{--
  Template Name: Ballet Category
--}}

@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())
        @include('partials.page-ballet-category-header')
        @include('partials.content-ballet-category')
    @endwhile
@endsection

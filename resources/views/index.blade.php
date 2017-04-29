@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <h1>TFG CODESHIP CI/CD</h1>
  <h2>Deployed via Codeship!!!</h2>
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @while (have_posts()) @php(the_post())
    @include ('partials.content-'.(get_post_type() !== 'post' ? get_post_type() : get_post_format()))
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection

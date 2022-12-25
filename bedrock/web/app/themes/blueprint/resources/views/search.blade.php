@extends('layouts.app')

@section('content')

<section class="container-fluid">

  @if (! have_posts())
  <article>
    <h1>Sorry, no results were found.</h1>
  </article>
  @endif

  @while(have_posts()) @php(the_post())

  @endwhile

</section>

@endsection

{{-- @include('partials.grid') --}}

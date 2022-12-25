@extends('layouts.app')

@section('content')

<section class="container-fluid">

  @while(have_posts()) @php the_post() @endphp

  @endwhile

</section>

@endsection

@include('partials.grid')

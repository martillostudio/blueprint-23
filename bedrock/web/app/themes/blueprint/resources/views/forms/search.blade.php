<form role="search" method="get" action="{{ home_url('/') }}">
  <input class="aparence-none" type="search" value="{{ get_search_query() }}" name="s">
  <button class="aparence-none">Search</button>
</form>

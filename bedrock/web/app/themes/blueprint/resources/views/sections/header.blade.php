<header class="container-fluid fixed inset-x-0 top-0 z-40 items-center py-4">

  <div class="col-span-4 md:col-span-6">
    <a href="/">
      {!! get_svg('images.logo', 'h-6 w-auto') !!}
    </a>
  </div>

  @if (has_nav_menu('primary_navigation'))
  <nav class="col-span-6 hidden md:block" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'main-nav', 'echo' => false]) !!}
  </nav>
  @endif

  <div class="col-span-2 flex justify-end md:hidden">
    <div class="burger">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>

</header>

@include('sections.mobile-nav')

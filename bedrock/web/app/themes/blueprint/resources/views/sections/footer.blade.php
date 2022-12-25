<footer class="container-fluid py-4 text-sm">

  <div class="col-span-6">
    {!! date('Y') !!} © <a href="/">{!! bloginfo('name') !!}</a>
  </div>

  @if (has_nav_menu('primary_navigation'))
  <nav class="col-span-6 hidden lg:block" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'main-nav', 'echo' => false]) !!}
  </nav>
  @endif

</footer>

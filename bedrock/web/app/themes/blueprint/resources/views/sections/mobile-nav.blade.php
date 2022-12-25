<nav class="mobile-layer">
  <div class="flex-1 flex justify-center flex-col pt-14 pb-6 text-center">

    <div></div>

    <div class="flex-1 flex flex-col justify-center items-center">
      @if (has_nav_menu('primary_navigation'))
      <nav aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'mobile-nav', 'echo' => false]) !!}
      </nav>
      @endif
    </div>

    <div></div>

  </div>
</nav>

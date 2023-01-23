<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <!-- <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div> -->
  <div class="sidebar-wrapper">
    <ul class="nav">
      {{-- @foreach ($categories as $category)
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">
            <i class="material-icons">movie</i>
              <p>{{ $category->category }}</p>
          </a>
        </li> 
      @endforeach  --}}
    </ul>
  </div>
</div>
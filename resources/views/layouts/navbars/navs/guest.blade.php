<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ route('home') }}">{{ $title }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link f-18 bold">
            {{ __('Login') }}
          </a>
        </li>        
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
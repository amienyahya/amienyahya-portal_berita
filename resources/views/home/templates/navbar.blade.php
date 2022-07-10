<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">Lara News</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{  ($active === "home") ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{  ($active === "about") ? 'active' : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{  ($active === "posts") ? 'active' : '' }}" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{  ($active === "categories") ? 'active' : '' }}" href="/categories">Categories</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link btn btn-success" href="/login">Login</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link " href="/admin" target="blank-page">Dashboard</a>
        </li>
        <form action="/logout" method="post">
          @csrf
          <li class="nav-item">
            <button class="nav-link btn btn-warning" type="submit">Logout</button>
          </li>

        </form>
        @endguest
      </ul>
    </div>
  </div>
</nav>
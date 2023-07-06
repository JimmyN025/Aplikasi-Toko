<nav class="navbar navbar-expand-lg bg-info mb-2">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
          <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          <li class="nav-item">
            <a class="nav-link {{ ($active == "home") ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active == "about") ? 'active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active == "posts") ? 'active' : '' }}" href="/posts">Blog</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ ($active == "categories") ? 'active' : '' }}" href="/categories">Categories</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link {{ ($active == "space") ? 'active' : '' }}" href="/space">Space</a>
          </li>
        </ul>

        <ul class="navbar-nav">
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Logout</button>
                    </form>
                  </li>
                </ul>
              </li>
                @else
                
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($active == "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>

              @endauth
        </ul>
        
      </div>
    </div>
  </nav>

  
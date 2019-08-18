<nav>
    <div class="logo"><a href="/"><h1>Project: <span class="logo-span">CrowdSupport</span></h1></a></div>
    <ul class="links">
        <li><a href="/">home</a></li>
        <li><a href="/projects">projects</a></li>
        <li><a href="/news">news</a></li>

        <!-- If user is logged in show create projects link -->
        @if (Auth::check())
            <li><a href="/create-project">create project</a></li>
        @endif

        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="user-name-nav nav-link dropdown-toggle" href="/account" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
            <li>
                <div class="dropdown-menu dropdown-menu-right logoutthingy" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>
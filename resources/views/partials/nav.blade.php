<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav">
                <li class="nav-item nav-pills" ><a class="nav-link {{ setActive( 'home' ) }}" href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li class="nav-item nav-pills" ><a class="nav-link {{ setActive( 'about' ) }}" href="{{ route('about') }}">{{ __('About') }}</a></li>
                <li class="nav-item nav-pills" ><a class="nav-link {{ setActive( 'projects.index' ) }}" href="{{ route('projects.index') }}">{{ __('Projects') }}</a></li>
                <li class="nav-item nav-pills" ><a class="nav-link {{ setActive( 'contact' ) }}" href="{{ route('contact') }}">{{ __('Contact') }}</a></li>
                <li class="nav-item nav-pills" ><a class="nav-link {{ setActive( 'paperbin' ) }}" href="{{ route('paperbin') }}">{{ __('Paper Bin') }}</a></li>
                @guest
                <li class="nav-item nav-pills"><a class="nav-link {{ setActive( 'login' ) }}" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @else
                <li class="nav-item nav-pills"><a class="nav-link {{ setActive( 'logout' ) }}" href="#"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Close session</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

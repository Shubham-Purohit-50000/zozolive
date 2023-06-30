<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/') }}">
                <i class="bi bi-house"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('my-favorites') }}">
                <i class="bi bi-heart"></i>
                <span>My Favorites</span>
            </a>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ url('watch-history') }}">
                <i class="bi bi-clock-history"></i>
                <span>Watch History</span>
            </a>
        </li> -->

        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ url('become-a-model') }}">
                <i class="bi bi-people-fill"></i>
                <span>Become a Model</span>
            </a>
        </li>
        @endguest
        @role('user')
        <li class="nav-item">
            <a class="nav-link" href="{{ url('become-a-model') }}">
                <i class="bi bi-people-fill"></i>
                <span>Become a Model</span>
            </a>
        </li>
        @endrole
        <hr />
        <br />
        <p class="special_category mb-0">Country</p>
        @foreach ($countries as $country)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('?country='.strtolower($country->code)) }}">
                    <img src="{{ $country->icon }}" class="country__icon" />
                    <span>{{ $country->name }}</span>
                </a>
            </li>
        @endforeach

        <hr />
        <br />
        <p class="special_category mb-0">Languages</p>
        @foreach ($languages as $language)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('?language='.strtolower($language->name)) }}">
                    <span>{{ $language->name }}</span>
                </a>
            </li>
        @endforeach
    </ul>

</aside>

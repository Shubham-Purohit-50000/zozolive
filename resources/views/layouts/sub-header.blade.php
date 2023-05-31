<nav class="second-nav">
    <ul class="second-nav-ul">
        <li class="second-nav-li">
            <div class="chip">
                <div class="chip-head"></div>
                <div class="chip-content">Chip Content</div>
            </div>
        </li>
        @auth
            <li class="second-nav-li">
                <a class="second-nav-a" href="{{ url('profile') }}">
                    Profile
                </a>
            </li>
        @endauth
        <li class="second-nav-li">
            <a class="second-nav-a" href="#">
                Videos
            </a>
        </li>
        <li class="second-nav-li">
            <a class="second-nav-a" href="#">
                Photos
            </a>
        </li>
        <li class="second-nav-li">
            <a class="second-nav-a" href="#">
                Feed
            </a>
        </li>
        <li class="second-nav-li">
            <div class="chip" style="margin-right: 10px">
                <div class="chip-content" style="padding: 0 8px">
                    Join Fan Club
                </div>
            </div>
        </li>
    </ul>
</nav>

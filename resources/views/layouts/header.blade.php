<header id="header" class="header fixed-top d-flex align-items-center">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true"
         style="background-color: black; color: white; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-between logo_wrapper">
        <i class="bi bi-list toggle-sidebar-btn color_white"></i>
        <a href="{{ url('/') }}" class="logo d-flex align-items-center text-white ">
            ZOZO LIVE
        </a>
    </div><!-- End Logo -->

    <div class="total_live d-flex align-items-center mob-disnone">
        <span class="total_live--icon">●</span>
        <span class="color-white text-upper total_live--count">
        <?php
                                                $count = totalLiveUsers();
                                            ?>
        {{ $count}} Live</span>
    </div>
    @php
        $search = request('search') ?? null;
    @endphp
    <div class="search-bar mob-disnone">
        <form class="search-form d-flex align-items-center" action="/">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search"
                   title="Enter search keyword">
            <button type="button" @class([
            'd-flex align-items-center',
        'ml-60' => $search,
        'ml-30' => !$search
]) style="gap: 0.5rem">
                @if($search)
                    <a href="/"><i class="bi bi-x h4" title="Reset"></i></a>
                @endif
                <i class="bi bi-search" title="Search"></i>
            </button>
        </form>
    </div><!-- End Search Bar -->
    <nav class="header-nav ml-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-lg-none d-block mob-disnone">
                <a class="nav-link nav-icon search-bar-toggle  mob-disnone" href="#">
                    <i class="bi bi-search" style="color: #f8f8f8;     font-size: 1.1rem;"></i>
                </a>
            </li>
            @guest
                <li class="nav-item signup__btn">
                    <a class="nav-link nav-icon search-bar-toggle loginLink bg_button" href="javascript::void();"
                       data-bs-toggle="modal" data-bs-target="#basicModal">
                        Create Account
                    </a>
                </li>
                <li class="nav-item login__btn">
                    <a class="nav-link nav-icon search-bar-toggle loginLink outline_button" href="javascript::void();"
                       data-bs-toggle="modal" data-bs-target="#loginModal">
                        Log In
                    </a>
                </li>
            @else
                @php
                    $user = auth()
                        ->user()
                        ->loadCount('favorites');
                @endphp
                <li class="nav-item d-block mob-disnone  chat__icon">
                    <a href="{{ url('chat') }}">
                        <i class="bi bi-chat-left-text search-bar-toggle nav-link nav-icon  cursor-pointer"
                           style="color: #f8f8f8;     font-size: 1.1rem;"></i>
                    </a>
                </li>
                <li class="nav-item ms-2  me-2 d-block desktop-d-none mob-disblock chat__icon">
                    <a href="{{ url('chat') }}">
                        <i class="bi bi-chat-left-text search-bar-toggle nav-link nav-icon  cursor-pointer"
                           style="color: #f8f8f8;     font-size: 1.1rem;"></i>
                           <span style="color:#fff; font-size:12px">Chat</span>
                    </a>
                </li> 
                 <li class="nav-item d-block ms-2 text-center desktop-d-none mob-disblock chat__icon">
                 <a href="{{ url('buy-token') }}" title="Buy Token" class="buyTkn">
                            
                            <span class="search-bar-toggle nav-link nav-icon"
                                  style="font-size: 0.8rem; color: #f8f8f8; margin-top:2px;margin-left:5px;">
                                 {{ Auth::user()->token ?? 0 }} tk <br/>+ Buy Token</span> 
            </a>    
                </li>
                <li class="nav-item d-block mob-disnone notification__icon">
                    <i class="bi bi-bell search-bar-toggle nav-link nav-icon  "
                       style="color: #f8f8f8;     font-size: 1.1rem;"></i>
                </li>
                <li class="nav-item d-block mob-disnone">
                    <div class="d-flex align-items-center">
                        @role('model')
                        <i class="bi bi-heart-fill search-bar-toggle nav-link nav-icon  "
                           style="color: #f8f8f8;font-size: 1.1rem; margin-right:1px; margin-left: 0.2rem"> </i><span
                                class="search-bar-toggle nav-link nav-icon"
                                style="font-size: 0.8rem; color: #f8f8f8; margin-top:2px; margin-left: 0.2rem">{{ $user->favorites_count }}</span>
                        <span class="search-bar-toggle nav-link nav-icon"
                              style="font-size: 0.8rem; color: #f8f8f8; margin-top:2px">
                              <?php
                              $total_token = hostTodayRecievedToken($user->uuid)
                              ?>
                              {{ $total_token ?? 0 }} tk
                            </span>
                        @endrole
                        @role('user')
                        <a href="{{ url('buy-token') }}" title="Buy Token" class="buyTkn">
                            <i class="bi bi-funnel search-bar-toggle nav-link nav-icon  "
                               style="color: #f8f8f8;font-size: 1.1rem; margin-right:1px"> </i>
                            <span class="search-bar-toggle nav-link nav-icon"
                                  style="font-size: 0.8rem; color: #f8f8f8; margin-top:2px;margin-left:5px;">{{ Auth::user()->token ?? 0 }}
                                        tk</span>
                            <span class="bg-green buy_token_plus_btn">+</span></a>
                        @endrole
                    </div>
                </li>
                @role('model')
                <li class="nav-item d-block">
                    <a href="/live-stream/start"
                       class="search-bar-toggle loginLink outline_button nav-link nav-icon broadcast_center"
                       style="background-color: #79943D;"><i class="bi bi-play-fill d-inline-block"></i>
                        <span class="broadcast_center--text">Broadcast centre</span>
                    </a>
                </li>
                @endrole
                @php
                    $user = auth()->user();
                    //$user_total_token = auth()->user()->
                    $name = auth()->user()->username ?? auth()->user()?->name;
                @endphp
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0 show" href="#"
                       data-bs-toggle="dropdown" aria-expanded="true">
                        @if (auth()->user()->avatar)
                        
                            <img class="search-bar-toggle loginLink dotImage nav-icon" src="/images/{{  $user->profile_image }}"
                                 alt=""/>
                        @else
                            <span class="username__label">{{ substr($name, 0, 1) }}</span>
                        @endif
                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile pt-0"
                        data-popper-placement="bottom-end">
                        <li class="dropdown-header">
                            <div class="username_detail">
                                @php
                                    $name = auth()->user()->username ?? auth()->user()->name;
                                @endphp
                                @if ($user->avatar)
                                    <img class="search-bar-toggle loginLink dotImage nav-icon ml-0"
                                         src="/images/{{$user->profile_image }}" alt=""/>
                                    {{ $name }}
                                @else
                                    {{-- <span class="username__label">{{ substr($name, 0, 1) }}</span> --}}
                                    <span class="username_first">{{ substr($name, 0, 1) }}</span>
                                    <div class="d-flex flex-column">
                                        <p class="mb-0">
                                            {{ $name }}
                                        </p>
                                        <p class="mb-0">
                                            <?php
                                                $level_data = get_user_level($user->token);
                                            ?>
                                            Level {{$level_data['level']}}
                                        </p>
                                    </div>

                                @endif
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('profile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        @role('user')
                        {{--                                <li>--}}
                        {{--                                    <a class="dropdown-item d-flex align-items-center" href="{{ url('profile') }}">--}}
                        {{--                                        <i class="bi bi-contact"></i>--}}
                        {{--                                        <span>My Collection</span>--}}
                        {{--                                    </a>--}}
                        {{--                                </li>--}}
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('profile') }}">
                                <i class="bi bi-people"></i>
                                <span>My Friends</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('my-favorites') }}">
                                <i class="bi bi-heart"></i>
                                <span>My Favorities</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('call-history') }}">
                                <i class="bi bi-telephone-fill"></i>
                                <span>Token History</span>
                            </a>
                        </li>
                        @endrole
                        @role('model')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('call-history') }}">
                                <i class="bi bi-telephone-fill"></i>
                                <span>Token History</span>
                            </a>
                        </li>
                        @endrole
                        <li>
                            <form method="post" action="{{ url('logout') }}">
                                @csrf

                                <button class="dropdown-item" type="submit"><i
                                            class="bi bi-box-arrow-right d-inline-block"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
            <li class="nav-item d-none mob-disnone" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots-vertical"></i>
            </li>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile pt-0 text-white"
                style="background-color: #373737; right: 1rem">
                @guest
                    <li>
                        <a href="javascript::void();" class="dropdown-item d-flex align-items-center cursor-pointer"
                           data-bs-toggle="modal" data-bs-target="#basicModal">
                            Create Account
                        </a>
                    </li>
                    <li class="nav-item d-block">
                        <a class="dropdown-item d-flex align-items-center"
                           href="javascript::void();" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Log In
                        </a>
                    </li>
                @else
                    <li class="dropdown-item nav-item d-block">
                        <a href="{{ url('chat') }}" class="d-flex align-items-center">
                            <i class="bi bi-chat-left-text nav-icon  cursor-pointer"
                               style="color: #f8f8f8;     font-size: 1.1rem;"></i>
                            Chat
                        </a>
                    </li>
                    <li class="dropdown-item nav-item d-block">
                        <a href="{{ url('notifications') }}" class="d-flex align-items-center">
                            <i class="bi bi-bell nav-icon cursor-pointer"
                               style="color: #f8f8f8;font-size: 1.1rem;"></i>
                            Notification
                        </a>
                    </li>
                    <li class="dropdown-item nav-item d-block">
                        <a href="{{ url('buy-token') }}" class="d-flex align-items-center">
                            <i class="bi bi-plus nav-icon cursor-pointer"
                               style="color: #f8f8f8;font-size: 1.1rem;"></i>
                            @role('user')
                            Buy Token
                            (
                            <span class=""
                                  style="font-size: 0.8rem; margin-top:2px;margin-left:5px;">{{ Auth::user()->token ?? 0 }}
                                        tk</span>
                            )
                            @endrole
                            @role('model')
                            <span class=""
                                  style="font-size: 0.8rem; margin-top:2px;margin-left:5px;">{{ Auth::user()->token ?? 0 }}
                                        tk</span>
                            @endrole
                        </a>
                    </li>
                    <li class="nav-item d-block  mob-disnone">
                        <div class="d-flex">
                            <i class="bi bi-heart-fill search-bar-toggle nav-link nav-icon  "
                               style="color: #f8f8f8;     font-size: 1.1rem; margin-right:1px"> </i><span
                                    class="search-bar-toggle nav-link nav-icon"
                                    style="font-size: 0.8rem; color: #f8f8f8; margin-top:2px">56,600</span>
                        </div>
                    </li>
                    @role('model')
                    <li class="nav-item d-block  mob-disnone">
                        <div class="d-flex">
                            <i class="bi bi-heart-fill search-bar-toggle nav-link nav-icon  "
                               style="color: #f8f8f8;     font-size: 1.1rem; margin-right:1px"> </i><span
                                    class="search-bar-toggle nav-link nav-icon"
                                    style="font-size: 0.8rem; color: #f8f8f8; margin-top:2px">70 tk</span>
                        </div>
                    </li>
                    <li class="nav-item d-block mob-disnone">
                        <a href="{{ route('streaming.start') }}"
                           class="search-bar-toggle loginLink outline_button nav-link nav-icon"
                           style="background-color: #79943D;"><i class="bi bi-play-fill"></i>Broadcast centre</a>
                    </li>
                    @endrole
                    {{--                        <li class="nav-item d-block">--}}
                    {{--                            <img class="search-bar-toggle loginLink dotImage nav-icon"--}}
                    {{--                                src="https://via.placeholder.com/50x50" alt="">--}}
                    {{--                        </li>--}}
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0 show" href="#"
                           data-bs-toggle="dropdown" aria-expanded="true">
                            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile"
                            data-popper-placement="bottom-end">
                            <li class="dropdown-header">
                                <h6>
                                    <span>{{ substr(Auth::user()->username, 0, 1) }}</span>
                                    {{ Auth::user()->username }}
                                </h6>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('profile') }}">
                                    <i class="bi bi-person"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            @role('model')
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('call-logs') }}">
                                    <i class="bi bi-telephone-fill"></i>
                                    <span>Call Logs</span>
                                </a>
                            </li>
                            @endrole
                            <li>
                                <form method="post" action="{{ url('logout') }}">
                                    @csrf

                                    <button class="dropdown-item" type="submit"><i
                                                class="bi bi-box-arrow-right"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                {{--                    <li class="nav-item d-none  mob-disblock" data-bs-toggle="dropdown" aria-expanded="false">--}}
                {{--                        <i class="bi bi-three-dots-vertical"></i>--}}
                {{--                    </li>--}}
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile"
                    style="background-color: #373737;">
                    @guest
                        <li>
                            <a class="dropdown-item d-flex align-items-center  search-bar-toggle  outline_button"
                               data-bs-toggle="modal" data-bs-target="#basicModal">
                                Sign Up
                            </a>
                        </li>
                        <li>
                            <a class="nav-link nav-icon search-bar-toggle loginLink outline_button"
                               href="javascript::void();" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Log In
                            </a>
                        </li>
                    @else
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('profile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        @role('model')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('call-logs') }}">
                                <i class="bi bi-telephone-fill"></i>
                                <span>Call Logs</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.broadcast') }}"
                               class="search-bar-toggle loginLink outline_button nav-link nav-icon"
                               style="background-color: #79943D;"><i class="bi bi-play-fill"></i>Broadcast centre</a>
                        </li>
                        @endrole
                        <li>
                            <form method="post" action="{{ url('logout') }}">
                                @csrf

                                <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </ul>
        </ul>
    </nav>

</header>

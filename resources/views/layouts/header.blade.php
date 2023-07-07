<?php
 $user = auth()
 ->user();
$level_data = get_user_level($user->token);
 ?>
<style>
    .hexagon {
        margin-top: 10px;
        width: 40px;
        height: 16px;
        position: relative;
        display: inline-block;
        background-color: {{$level_data['color']}};
        
  }
  .hexagon::before {
    content: " ";
    width: 0; height: 0;
    border-color: inherit;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    position: absolute;
    top: -15px;
    border-bottom: 15px solid {{$level_data['color']}};
  }
  .hexagon::after {
    content: "";
    width: 0;
    position: absolute;
    bottom: -13px;
    border-top: 13px solid;
    border-color: {{$level_data['color']}};
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
   
  }
  .hexagon span {
    z-index: 100;
    position: absolute;
    left: 15px;
    top: 0px;
    font-weight: bold;
    font-size: 12px;
  }
  
</style>
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
                <li class="nav-item ms-2 header_btn me-2 d-block desktop-d-none mob-disblock chat__icon">
                    <a href="{{ url('chat') }}">
                        <i class="bi bi-chat-left-text  ms-2 mt-1 search-bar-toggle nav-link nav-icon  cursor-pointer"
                           ></i>
                           <span >Chat</span>
                    </a>
                </li> 
                 <li class="nav-item d-block me-0 header_btn nav-item text-center desktop-d-none mob-disblock chat__icon">
                 <a href="{{ url('buy-token') }}" title="Buy Token">
                            
                            <span 
                                >
                                 <img src="/assets/coin2.png" width="16" class="mb-2px"/> tk <br/> {{ Auth::user()->token ?? 0 }}</span> 
            </a>    
                </li>
                <!-- <li class="nav-item d-block mob-disnone notification__icon">
                    <i class="bi bi-bell search-bar-toggle nav-link nav-icon  "
                       style="color: #f8f8f8;     font-size: 1.1rem;"></i>
                </li> -->
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
                             <span class="wegiht-600"> {{ $total_token ?? 0 }} </span> <img src="/assets/coin2.png" width="18" class="mb-4px"/>
                            </span>
                        @endrole
                        @role('user')
                        <a href="{{ url('buy-token') }}" title="Buy Token" class="buyTkn">
                            <i class="bi bi-funnel search-bar-toggle nav-link nav-icon  "
                               style="color: #f8f8f8;font-size: 1.1rem; margin-right:1px"> </i>
                            <span class="search-bar-toggle nav-link nav-icon"
                                  style="font-size: 0.8rem; color: #f8f8f8; margin-top:2px;margin-left:5px;">{{ Auth::user()->token ?? 0 }}
                                  <img src="/assets/coin2.png" width="18"/> </span>
                            <span class="bg-green buy_token_plus_btn">+</span></a>
                        @endrole
                    </div>
                </li>
                @role('model')
                <li class="nav-item display-mobile header_btn ms-2">
                <a href="/live-stream/start">
                        <i class="bi bi-play-circle  ms-2 mt-1 search-bar-toggle nav-link nav-icon  cursor-pointer"
                           style="font-size: 1.1rem;"></i>
                           <span style="font-size:12px"> Live</span>
                    </a>
                </li>
                <li class="nav-item display-desktop">
                    <a href="/live-stream/start"
                       class="search-bar-toggle  loginLink outline_button nav-link nav-icon broadcast_center"
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
                <li class="nav-item ms-2 dropdown  text-center header_btn display-mobile me-2">
                     <a class="nav-link  show text-center" href="#"
                       data-bs-toggle="dropdown" aria-expanded="true">
                        @if (auth()->user()->profile_image)
                        
                            <img class="search-bar-toggle " width="18" height="18" src="/images/{{  $user->profile_image }}"
                                 alt="" style="margin-top:2px; border-radius:20px"/>
                        @else
                        <i class="bi bi-person ms-2 mt-1 search-bar-toggle nav-link nav-icon  cursor-pointer"></i>
                        @endif
                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a>
                    <span >{{ substr($name, 0, 4) }}</span>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile pt-0"
                        data-popper-placement="bottom-end">
                        <li class="dropdown-header">
                            <div class="username_detail">
                                @php
                                    $name = auth()->user()->username ?? auth()->user()->name;
                                    $email = auth()->user()->email ?? auth()->user()->email;
                                   
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
                        <li class="copyText">
                             <input type="text" class="copy_text_input" id="copyText2" value="{{ $email }}">
                             <button class="btn btn-sm btn-link" onclick="copyToClipboard('copyText2')"><i class="bi bi-clipboard-fill mt-4 ms-1"></i>  </button>
                            </li>
                        <li>
                        <li>
                            <hr class="dropdown-divider mt-2">
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
                    <!-- <a href="{{ url('chat') }}">
                        <i class="bi bi-chat-left-text  ms-2 mt-1 search-bar-toggle nav-link nav-icon  cursor-pointer"
                           ></i>
                           
                    </a> -->
            </ul>
                </li> 
                <li class="nav-item dropdown pe-3 display-desktop">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0 show" href="#"
                       data-bs-toggle="dropdown" aria-expanded="true">
                        @if (auth()->user()->profile_image)
                        
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
                                    $email = auth()->user()->email ?? auth()->user()->email;
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
                                    </div>

                                @endif
                            </div>
                        </li>
                        <li class="user_level">
                             <p class="mb-0">
                                            <?php
                                                $level_data = get_user_level($user->token);
                                            ?>
                                            <div class="d-flex">
                                            <div class="me-5 d-flex ">
                                                <div class="hexagon  me-1">
                                              <span>  {{$level_data['level']}} </span>
                                            </div>
                                            <strong class="ms-2 mt-1">Level</strong>
                                            </div>
                                            <div>
                                                <a href="/user/level-system" style="color:{{ $level_data['color'] }}" class="mt-1 d-flex">
                                                {{$level_data['name']}} <i class="bi bi-arrow-right-short mt-1 ms-1"></i>
            </a>
                                            </div>
                                            </div>
                            </p>
                          
                            <div class="progress">
                            <?php 
                                $percent = ($user['token']- $level_data['previous_level'])  / $level_data['token']  * 100;
                             ?>
                        <div class="progress-bar bg-progress" role="progressbar" style="width: {{ $percent }}%">
                        <!-- aria-valuenow="25" aria-valuemin="0" aria-valuemax="100 -->
                       
                        <span class="ms-2 p-absolute"> {{ $user['token']}} / {{ $level_data['token'] }}</span> 
                       <span class="p-absolute-2"> Level {{ $level_data['level'] }}</span> 
                        </div>
                        </div>
                        
    
                            <p class="mb-0 mt-0">Get {{ $level_data['token']-$user['token'] }} token for level {{ $level_data['level']}}  </p>
                         </li> 
                         <li class="copyText">
                             <input type="text" class="copy_text_input" id="copyText" value="{{ $email }}">
                             <button class="btn btn-sm btn-link" onclick="copyToClipboard('copyText')"><i class="bi bi-clipboard-fill mt-4 ms-1"></i>  </button>
                         </li>
                        <li>
                            <hr class="dropdown-divider mt-2">
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
            @guest
            
            <li class="nav-item display-mobile me-3">
                            <a class="dropdown-item d-flex align-items-center  search-bar-toggle  outline_button"
                               data-bs-toggle="modal" data-bs-target="#basicModal">
                                Sign Up
                            </a>
                        </li>
                        <li class="nav-item d-none  mob-disblock" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots-vertical"></i>
            </li>
            <!-- <li class="display-mobile me-3">
                        <a href="javascript::void();" class="dropdown-item line-height-10 text-center align-items-center cursor-pointer"
                           data-bs-toggle="modal" data-bs-target="#basicModal">
                           <i class="bi bi-person fs-3"></i> <br/>
                            Create Account
                        </a>
                    </li> -->
                    <!-- <li class="display-mobile me-3">
                        <a class="dropdown-item  text-center line-height-10  align-items-center"
                           href="javascript::void();" data-bs-toggle="modal" data-bs-target="#loginModal"> 
                           <i class="bi bi-box-arrow-in-right fs-3"></i><br/>
                            Log In
                        </a>
                    </li> -->
            @endguest
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile pt-0 text-white"
                style="background-color: #373737; right: 1rem">
                @guest
                    <li>
                        <a href="javascript::void();" class="dropdown-item d-flex align-items-center cursor-pointer"
                           data-bs-toggle="modal" data-bs-target="#basicModal">
                           <i class="bi bi-person"></i> Create Account
                        </a>
                    </li>
                   
                    <li class="nav-item display-mobile">
                        <a class="dropdown-item d-flex align-items-center"
                           href="javascript::void();" data-bs-toggle="modal" data-bs-target="#loginModal">
                           <i class="bi bi-box-arrow-in-right"></i>  Log In
                        </a>
                    </li>
                    <li class="nav-item display-mobile">
                        <a class="dropdown-item d-flex align-items-center"
                           href="/become-a-model">
                           <i class="bi bi-camera-video-fill ms-1"></i>  Become a model
                        </a>
                    </li>
                @else
                    <li class="dropdown-item nav-item display-desktop">
                        <a href="{{ url('chat') }}" class="d-flex align-items-center">
                            <i class="bi bi-chat-left-text nav-icon  cursor-pointer"
                               style="color: #f8f8f8;     font-size: 1.1rem;"></i>
                            Chat
                        </a>
                    </li>
                    <!-- <li class="dropdown-item nav-item display-desktop">
                        <a href="{{ url('notifications') }}" class="d-flex align-items-center">
                            <i class="bi bi-bell nav-icon cursor-pointer"
                               style="color: #f8f8f8;font-size: 1.1rem;"></i>
                            Notification
                        </a>
                    </li> -->
                    <li class="dropdown-item nav-item display-desktop">
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
<script>
       function copyToClipboard(id) {
        console.log(id);
        document.getElementById(id).select();
        document.execCommand('copy');
    }
</Script>
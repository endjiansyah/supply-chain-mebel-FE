<nav id="header" class="border-[primary]/10">
    <div class="container">
        <h1>SCM</h1>

        <!-- btn hamburger -->
        <button data-collapse-toggle="navbar-default" type="button" class="hamburger"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>

        <div id="navbar-default" class="hidden lg:block w-full">
            <div class="hidenisasi">
                <!-- left -->
                <div class="menu-navigation">
                    <ul>
                        <li><a href="{{route('home')}}" class="{{$page == 'home' ? 'active': ''}}">Home</a></li>
                        <li><a href="{{route('barang.index')}}" class="{{$page == 'barang'? 'active': ''}}">Barang</a></li>
                        <li><a href="{{route('order.index')}}" class="{{$page == 'order'? 'active': ''}}">Order</a></li>
                        @if (session('id_user') == 1)
                            <li><a href="{{route('user.index')}}" class="{{$page == 'user'? 'active': ''}}">User</a></li>
                        @endif
                    </ul>
                </div>

                <!-- right -->
                <div class="menu-action items-center">
                    <div class="button">
                        {{-- {{session('id_role')}} --}}
                        <a onclick="return confirm('logout ?')" href="{{ route('logout') }}">Log out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

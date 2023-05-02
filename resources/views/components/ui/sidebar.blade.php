<!-- Sidebar -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">

        <span class="brand-text font-weight-light text-primary">
            <img src="{{asset('img\icons\sidebar\logo.png')}}" alt="LOGO" class="brand-imagee img-circles elevation-3f"
                 style="opacity: .7; width: 235px; height: 56px;"/>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav    >
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @foreach($sideBarItems as $sideBarItem)
                    <li class="nav-item">
                        <a href="{{ $sideBarItem['link']  }}"
                            @class([
                                      'nav-link',
                                      'active'=> $sideBarItem['is_active'],
                                 ])>
                            <img src="{{ asset("img/icons/sidebar/".$sideBarItem['icon'].".png") }}"
                                 class="mr-2 sidebar-icon">
                            <p>
                                {{ $sideBarItem['title'] }}
                            </p>
                        </a>
                    </li>
                @endforeach

                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                       class='nav-link'>
                        <img src="{{ asset("img/icons/sidebar/signout.png") }}" class="mr-2 sidebar-icon">
                        <p>
                            Logout
                        </p>
                    </a>

                    <x-form id="logout-form" action="{{ route('logout') }}" class="d-none"/>
                </li>

            </ul>
        </nav>
    </div>
</aside>

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div id="sideBar" class="scroll-sidebar scrollbar-box">
        <!-- Sidebar navigation-->
        <nav id="sideBarNav" class="sidebar-nav">
            <ul id="sidebarnav" class="in">

                @if(count($sidebar_menu))
                    @foreach($sidebar_menu as $link)
                        @if(isset($link[0]))
                            <li class="sidebar-item hr mb-3">
                            @foreach($link as $sublink)
                                @if((isset($sublink['permission'])  and (artadmin_user()->can($sublink['permission']) or artadmin_user()->can("root"))) or (!isset($sublink['permission'])))
                                        <a class="sidebar-link sidebar-link" href="{{ route($sublink['route_name']) }}" aria-expanded="false">
                                            {!! $sublink['icon'] !!}<span class="hide-menu">{{ $sublink['title'] }} </span>
                                        </a>
                                     @endif
                            @endforeach
                            </li>
                        @else
                        @if((isset($link['permission'])  and (artadmin_user()->can($link['permission']) or artadmin_user()->can("root"))) or (!isset($link['permission'])))

                                    @if(isset($link['route_name']))
                                    <li class="sidebar-item hr">
                                    <a class="sidebar-link" href="{{ route($link['route_name']) }}" aria-expanded="false">
                                        {!! $link['icon'] !!}
                                        <span class="hide-menu">{{ $link['title'] }}</span>
                                    </a>
                                    </li>
                                    @elseif(isset($link['links']))
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                        {!! $link['icon'] !!}

                                        <span class="hide-menu">{{ $link['title'] }}</span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level">
                                        @foreach($link['links'] as $sublink)
                                            @if((isset($sublink['permission'])  and (artadmin_user()->can($sublink['permission']) or artadmin_user()->can("root"))) or (!isset($sublink['permission'])))

                                            <li class="sidebar-item">
                                                <a href="{{ route($sublink['route_name']) }}" class="sidebar-link">{!! $sublink['icon'] !!}<span class="hide-menu">{{ $sublink['title'] }}</span></a>
                                            </li>
                                            @endif
                                         @endforeach


                                    </ul>
                                </li>
                                    @else
                                    <li class="nav-small-cap">
                                        {!! $link['icon'] !!}
                                        <span class="hide-menu">{{ $link['title'] }}</span>
                                    </li>
                                    @endif



                         @endif
                        @endif
                    @endforeach
                @endif






            </ul>
        </nav>
        <!-- End Sidebar navigation -->
        <!-- / Sidebar scroll-->
        <div id="sidebarScrollyBox" class="sidebar-scrollbar-y-box"><div id="sidebarScrolly" class="sidebar-scrollbar-y"></div></div></div>
    <!-- / Sidebar scroll-->
</aside>

<!doctype html>
<html lang="ru"><!-- InstanceBegin template="/Templates/basic-workspace.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{ asset("vendor/artadmin/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("vendor/artadmin/css/total.css") }}">
    <link rel="stylesheet" href="{{ asset("vendor/artadmin/css/iconset-admin.css") }}">
    @include("laravel-trumbowyg::load_css")
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>@yield('title')</title>
    <!-- InstanceEndEditable -->

    <!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->

</head>


<body class="over-hidd">

<div class="preload-cover"></div>




    <header>
        <nav class="navbar navbar-collapse navbar-expand-md">
            <!--<div class="logo navbar-brand"><a href="/"><b><img src="img/logo-stone-free-sm.png"></b><img src="img/logo-name-hor.png"></a></div>-->

            <div class="logo navbar-brand">
                <a href="{{ route("artadmin.index") }}">
                    <!-- logo - sign-->
                    <span class="logo-sign">
								<svg version="1.1" id="logoSVGmark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 119.14 120.37" style="enable-background:new 0 0 119.14 120.37;" xml:space="preserve">
									<path d="M11.87,109.69C5.11,103.24-0.19,97.34,1.23,93.07c1.98-5.95,9.44-6.65,14.34-7.58
										c4.9-0.93,15.69-0.76,24.06,0.06c8.51,0.83,37.48,3.66,45.39,5.07c9.79,1.74,24.69,3.33,23.82,10.45
										c-0.88,7.19-4.76,9.77-11.88,12.69c-5.58,2.29-15.54,5.99-30.37,6.45c-5.48,0.17-13.17,0.48-25.6-0.84
										C27.82,117.97,16.89,114.47,11.87,109.69z M62.61,82.53c14.35,1.15,22.19,0.94,33.11-2.47c12-3.75,19.84-5.34,21.08-11.63
										c1.44-7.32-15.64-9.38-23.89-11.07c-13.64-2.79-32.47-2.57-44.64-1.5c-12.76,1.13-23.67,3.75-21.95,10.33
										C29.79,79.49,51.52,81.63,62.61,82.53z M67.01,34.83c-8.52-1.14-14.23-0.53-21.87,0.47c-7.63,1-6.76,7.96,0.27,11.46
										c7.03,3.5,13.46,4.87,22.9,3.97c11.92-1.14,16.28-3.51,15.38-7.87C82.23,35.71,75.52,35.96,67.01,34.83z M61.66,0.36
										c-3.1-0.5-5.99-0.79-9.78,1.38c-4.69,2.69-2.5,7.86,0.63,8.76c3.13,0.9,8.21,0.57,11.08,0.23c3.28-0.39,5.64-1.88,5.63-4.65
										C69.21,1.64,64.76,0.86,61.66,0.36z M67.79,15.96c-3.65-0.19-14.41-0.01-22.5,1.25c-11.87,1.84-13.61,5.15-11.21,7.36
										c3.09,2.85,9.09,4.19,20.03,4.86c19.11,1.18,25.65-1.2,34.16-3.62c5.48-1.55,5.44-2.49,6.15-4.44
										C96.24,16.4,75.78,16.37,67.79,15.96z"/>
								</svg>
							</span>
                    <!-- logo - part 1 -->

                    <!-- logo - part 2 -->
                    <span class="logo-part-2">
							 {{ config("artadmin.name") }}
							</span>
                    <!-- / logo-->
                </a>
            </div>



            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-md-flex navbar-collapse" href="javascript:void(0)"><i class="icon-menu d-flex"></i></a> </li>
            </ul>
            <!-- top menu -->
            <ul class="navbar-nav">
                <li class="nav-item mr-1">
                    <a class="nav-link sidebartoggler d-none d-md-flex navbar-collapse" href="javascript:void(0)"><i class="icon-calendar d-flex"></i><i class="notify pulse"></i></a>
                </li>

                <li class="nav-item mr-1">
                    <a class="nav-link sidebartoggler d-none d-md-flex navbar-collapse" href="javascript:void(0)"><i class="icon-mail d-flex"></i><i class="notify pulse"></i></a>
                </li>

                <li class="nav-item mr-1">
                    <a class="nav-link sidebartoggler d-none d-md-flex navbar-collapse" href="javascript:void(0)"><i class="icon-basket-3 d-flex"></i><i class="notify pulse"></i></a>
                </li>

                <li class="nav-item mr-1 dropdown">
                    <a class="nav-link sidebartoggler d-none d-md-flex navbar-collapse dropdown-toggle" href="#" id="navbarDropdownCog" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="icon-cog d-flex"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownCog">
                        <li class="hdr">Настройки</li>

                        @if(count($top_menu_setup))
                            @foreach($top_menu_setup as $top_link)
                                @if((isset($top_link['permission'])  and (artadmin_user()->can($top_link['permission']) or artadmin_user()->can("root"))) or (!isset($top_link['permission'])))
                                    <li><a class="dropdown-item" href="{{ route($top_link['route_name']) }}">{{ $top_link['title'] }}</a></li>
                                @endif
                            @endforeach
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li><p class="dzenkit-themes js_dzenkit_themes">Темы:
                                <i class="_default actv"></i>
                                <i class="_corall"></i>
                                <i class="_blue"></i>
                                <i class="_violet"></i>
                                <i class="_grey"></i>
                            </p>
                        </li>
                        <li><p class="dzenkit-themes js_dzenkit_themes_bg">Фоны:
                                <i class="_bg_default actv"></i>
                                <i class="_bg_darkblue"></i>
                            </p>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">О продукте</a></li>
                    </ul>
                </li>

                <li class="nav-item mr-2 dropdown">
                    <a class="nav-link sidebartoggler d-none d-md-flex navbar-collapse dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-toggle="dropdown" aria-expanded="false"><i class="icon-user-circle-o d-flex"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownUser">
                        <li class="hdr">Пользователи</li>
                        @if(count($top_menu_right))
                            @foreach($top_menu_right as $top_link)
                                @if((isset($top_link['permission'])  and (artadmin_user()->can($top_link['permission']) or artadmin_user()->can("root"))) or (!isset($top_link['permission'])))
                                @if($top_link['title']=="current_user")
                                <li><a class="dropdown-item d-flex" href="{{ route($top_link['route_name']) }}"><span class="mr-auto">{{ artadmin_user()->name }}</span> <i class="{{$top_link['icon']}} ml-3 pl-3"></i></a></li>
                                @else
                                    <li><a class="dropdown-item d-flex" href="{{ route($top_link['route_name']) }}"><span class="mr-auto">{{ $top_link['title'] }}</span> <i class="{{$top_link['icon']}} ml-3 pl-3"></i></a></li>

                                @endif
                                    <li><hr class="dropdown-divider"></li>
                                @endif
                            @endforeach
                        @endif

                     </ul>
                </li>
            </ul>
            <!-- / top menu -->
        </nav>
    </header>

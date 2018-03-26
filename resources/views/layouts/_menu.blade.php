<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Efficax') }}</title>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/uniform.css" />
        <link rel="stylesheet" href="css/select2.css" />
        <link rel="stylesheet" href="css/fullcalendar.css" />
        <link rel="stylesheet" href="css/matrix-style.css" />
        <link rel="stylesheet" href="css/matrix-media.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/jquery.gritter.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>

        <!--Header-part-->
        <div id="header">
            <h1><a href="dashboard.html"> {{ config('app.name', 'Efficax') }} Admin</a></h1>
        </div>
        <!--close-Header-part--> 


        <!--top-Header-menu-->
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav">
                <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Bem Vindo {{ Auth::user()->name }}</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{Route('perfil')}}"><i class="icon-user"></i> Meu Perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-check"></i> Minhas Tarefas</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"><i class="icon-undo"></i> Log Out</a></li>
                    </ul>
                </li>
                <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Mensagens</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> Nova Mensagem</a></li>
                        <li class="divider"></li>
                        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> Entrada</a></li>
                        <li class="divider"></li>
                        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> Saida</a></li>
                        <li class="divider"></li>
                        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> Lixeira</a></li>
                    </ul>
                </li>
                <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Configurações</span></a></li>
                <li class=""><a title="" href="{{ route('logout') }}"><i class="icon icon-unlock"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>
        <!--close-top-Header-menu-->
        <!--start-top-serch-->
        <div id="search">
            <input type="text" placeholder="Procure aqui..."/>
            <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
        </div>
        <!--close-top-serch-->
        <!--sidebar-menu-->
        <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
            <ul>
                <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
                <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Cadastros</span> <span class="label label-important">3</span></a>
                    <ul>
                        <li><a href="{{ route('pessoa') }}">Pessoas</a></li>
                        <li><a href="form-validation.html">Produtos</a></li>
                        <li><a href="form-wizard.html">Serviços</a></li>
                    </ul>
                </li>
                
                <li> <a href="charts.html"><i class="icon icon-signal"></i> <span>Gráficos</span></a> </li>
                <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>
                    <ul>
                        <li><a href="index2.html">Dashboard2</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="invoice.html">Invoice</a></li>
                        <li><a href="chat.html">Chat option</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--sidebar-menu-->

        <!--main-container-part-->
        <div id="content">
            <!--breadcrumbs-->
            @yield('menutop')
            
            
            <!--End-breadcrumbs-->

            <!--Action boxes-->
            <div class="container-fluid">
                <div class="quick-actions_homepage">
                    <ul class="quick-actions">
                        <li class="bg_lb"> <a href="{{ route('home') }}"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> My Dashboard </a> </li>
                        <li class="bg_lg span3"> <a href="charts.html"> <i class="icon-signal"></i> Charts</a> </li>
                        
                        <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
                        

                    </ul>
                </div>
                <!--End-Action boxes-->

                @yield('content')

                
            </div>
        </div>

        <!--end-main-container-part-->

        <!--Footer-part-->
        @yield('rodape')

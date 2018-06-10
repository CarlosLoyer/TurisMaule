<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>TurisMaule | AdminWeb</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />


        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="<?php echo base_url(); ?>assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="<?php echo base_url(); ?>assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script>
            var URL = "http://localhost/TurisMaule/";
            var base_url = "http://localhost/TurisMaule/";
        </script>






        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <?php
        $user = $this->session->userdata("usuario");
        ?>


        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>





        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3 m3">      
                            <span class="chapter-title">Administrador</span>
                        </div>

                    </div>
                </nav>
            </header>

            <!-- BARRA LATERAL IZQUIERDA MENU  --> 
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                            <a href="javascript:void(0);" class="account-settings-link">
                                <p><?php echo $user[0]->nombre ?></p>
                                <span><?php echo $user[0]->email; ?><i class="material-icons right">arrow_drop_down</i></span>
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-account-settings">
                        <ul>
                            <li class="no-padding">
                                <a href="<?php echo base_url(); ?>logout" class="waves-effect waves-grey">
                                    <i class="material-icons">exit_to_app</i>
                                    Salir
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                        <li class="no-padding active"><a class="waves-effect waves-grey active" href="<?php echo base_url(); ?>administrador"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>
                        <li class="no-padding">
                            <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Gestión Puntos<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a id="item_punto" href="#">Ver puntos</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="no-padding">
                            <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Estadísticas<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a id="item_producto" href="#">poneralgo1</a></li>
                                    <li><a id="item_tipo_producto" href="#">poneralgo2</a></li>

                                </ul>
                            </div>
                        </li>

                        <div class="footer">
                            <p class="copyright">SteelCoders ©</p>
                            <p class="copyright">TurisMaule ©</p>
                        </div>
                </div>
            </aside>



            <main class="mn-inner inner-active-sidebar">

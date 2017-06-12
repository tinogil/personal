<?php
echo '<body class="uk-height-viewport blue-grey lighten-4">
    <header>
        <!-- Barra de navegación -->
        <div uk-sticky>
            <nav class="  uk-navbar-transparent graphite-gradient " uk-navbar>
                <div class="uk-light">
                    <a class="uk-logo uk-align-left uk-padding-small uk-padding-remove-bottom " href="">
                        <img src="http://'.$_SERVER['SERVER_NAME'].'/personal/images/loud.svg " style="width: 30px; height: 30px" uk-svg alt="">
                        <img class="uk-logo-inverse white-text uk-background-blend-luminosity" src="http://'.$_SERVER['SERVER_NAME'].'/personal/images/loud2.svg" style="width: 50px; height: 50px" uk-svg alt="">
                    </a>
                </div>
                <div class="uk-navbar-left  ">
                    <ul id="my-id3" class="uk-navbar-nav  uk-dark uk-visible@s">
                        <li class="uk-active ">
                            <a class=" white-text" href="http://'.$_SERVER['SERVER_NAME'].'/personal/index.php">Home</a>
                        </li>
                        <li>
                            <a href="http://'.$_SERVER['SERVER_NAME'].'/personal/planilla.php" class="">Programación</a>
                        </li>
                        <li>
                            <a href="http://'.$_SERVER['SERVER_NAME'].'/personal/programa.php">Shows</a>
                        </li>
                        <li>
                            <a href="http://'.$_SERVER['SERVER_NAME'].'/personal/contacto.php">Contacto</a>
                        </li>
                    </ul>
                </div>
                <!-- Reproductor y busqueda + icono para móvil -->
                <div class="uk-navbar-right  ">
                    <div class="uk-light uk-visible@s">
                        <a href="#" id="radio" uri="http://jazzspain.es:8000/1" class="pop"><img src="http://'.$_SERVER['SERVER_NAME'].'/personal/images/play.png" alt="reproductor" class="uk-icon-image">Escucha la emisión en vivo</a>
                    </div>
                    <div>
                        <a class="uk-navbar-toggle uk-light" href="#" uk-search-icon></a>
                        <div class="uk-navbar-dropdown" uk-drop="mode: click; cls-drop: uk-navbar-dropdown; boundary: !nav">

                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <div class="uk-width-expand">
                                    <form class="uk-search uk-search-navbar uk-width-1-1">
                                        <input class="uk-search-input " type="search" placeholder="Buscar..." autofocus>
                                    </form>
                                </div>
                                <div class="uk-width-auto">
                                    <a class="uk-navbar-dropdown-close" href="#" uk-close></a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <a class="uk-navbar-toggle uk-hidden@s" uk-toggle="target: #my-id" uk-navbar-toggle-icon href=""></a>

            </nav>

        </div>
        <!-- This is the off-canvas -->
        <div id="my-id" uk-offcanvas="mode: push">
            <div class="uk-offcanvas-bar blue-grey darken-1">

                <ul id="my-id2" class="uk-nav-default uk-nav  uk-dark uk-text-large">
                    <li class="uk-active ">
                        <a class=" white-text" href="http://'.$_SERVER['SERVER_NAME'].'/personal/">Home</a>
                    </li>
                    <li>
                        <a href="http://'.$_SERVER['SERVER_NAME'].'/personal/planilla.php" class="">Programación</a>
                    </li>
                    <li>
                        <a href="http://'.$_SERVER['SERVER_NAME'].'/personal/programa.php">Shows</a>
                    </li>
                    <li>
                        <a href="http://'.$_SERVER['SERVER_NAME'].'/personal/contacto.php">Contacto</a>
                    </li>
                    <li class="uk-nav-divider"></li>
                    <li class="uk-nav-divider"></li>
                    <li class="uk-light uk-text-small">
                        <a href="#" class="pop"><img src="http://'.$_SERVER['SERVER_NAME'].'/personal/images/play.png" alt="reproductor" class="uk-icon-image">Escucha la emisión en vivo</a>
                    </li>
                </ul>
            </div>

        </div>
    </header>';
<?php
require_once './controller/CtipoEmpresa.php';

$listaTPE = new CtipoEmpresa();
$result = $listaTPE->listaTPEmpresa();


?>

<!DOCTYPE html>
<html>

    <head>
        <!--Import Google Icon Font-->
        <link rel="stylesheet" href="lib/icon.css">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
        <link rel="stylesheet" href="css/ghpages-materialize.css"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>

    <body>
        <header>
            <nav class="top-nav #2e7d32 green darken-3">
                <div class="container">
                    <div class="nav-wrapper #2e7d32 green darken-3"><a class="page-title">MAPS</a>
                        <ul class="right hide-on-med-and-down ">
                            <li><a href="#"><i class="material-icons">search</i></a></li>
                            <li><a href="#"><i class="material-icons">view_module</i></a></li>
                            <li><a class="waves-effect waves-light btn modal-trigger" href="#modal1">Login <?php echo $result; ?></a></li>
<!--                            <li>Tflores<a href="#"><i class="material-icons">perm_identity</i></a></li>-->
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a></div>
            <ul id="nav-mobile" class="side-nav fixed " style="transform: translateX(0%);">
                <li class="logo"><a id="logo-container" href="http://materializecss.com/" class="brand-logo">
                        <img src="img/imglogo.jpg" id="front-page-logo"  ></a>
                </li>
                <li class="search">
                    <div class="search-wrapper card">
                        <input id="search"><i class="material-icons">search</i>
                        <div class="search-results"></div>
                    </div>

                </li>
                <li class=" select-wrapper container">
                    <div class="input-field ">
                        <select >
                            <option value="" disabled selected>Elija Opcion</option>
                            <option value="1">Universidad</option>
                            <option value="2">Colegios</option>
                            <option value="3">Restaurantes</option>
                            <option value="3">Parques Urbanos</option>
                            <option value="3">Hospitales</option>
                            <option value="3">Ginnacios</option>
                        </select>
                    </div>
                </li>

                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div id="form-login">
                                    <form action="proceso/RegEmpresa.php" class="col s12" method="post">
                                        <div class="row">
                                            <div class="col s12 #a5d6a7 green lighten-3">
                                                <h6 class="center login-title">Registrar Empresa</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <label for="name">Nombre Empresa</label>
                                                <input type="text" name="nombreEmpresa" id="nombreEmpresa" value="">
                                            </div>						
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <label for="email">Correo</label>
                                                <input type="email" name="email" id="email" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <label for="password">Contrase&ntilde;a</label>
                                                <input type="password" name="clave" id="clave" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select name="idTPEmpresa">
                                                    <option value="" disabled selected>Tipo</option>
                                                    <option value="1">Universidad</option>
                                                    <option value="2">Colegios</option>
                                                    <option value="3">Restaurantes</option>
                                                    <option value="3">Parques Urbanos</option>
                                                    <option value="3">Hospitales</option>
                                                    <option value="3">Ginnacios</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <input type="submit" class="btn center-align" value="Registrar">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
        <br>
        <main>
            <div class="row">
                <div class="col s12">
                    <div id="mapa" style="height: 550px;">

                    </div>
                </div>
            </div>
        </main>
        <footer class="page-footer #2e7d32 green darken-3">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2016 Copyright Tito Flores Vicente    
                    <a class="grey-text text-lighten-4 right" href="#!">Ver Link</a>
                </div>



            </div>
        </footer>



        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Modal Header</h4>
                <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>

    </body>

    <!--Import jQuery before materialize.js-->

</html>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG0VBqikX-1YalusKKHiwSBraGp1KkxVo&callback=initMap">
</script>
<script src="js/JMapas.js"></script>
<!--<script src="js/JMain.js"></script>-->
<script>
    $(document).ready(function () {
        $(".button-collapse").sideNav();
    })

    $(document).ready(function () {
        $('select').material_select();
    });

    $('select').material_select('destroy');

    $(document).ready(function () {
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
    });
</script>
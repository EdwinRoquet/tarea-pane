<?php

require_once "controllers/templeteControlador.php";
require_once "controllers/UsuarioControlador.php";
require_once "controllers/InformacionController.php";
require_once "controllers/NoticiaControlador.php";



require_once "models/ModeloNoticia.php";
require_once "models/ModeloUsuario.php";
require_once "models/ModeloInformacion.php";

$templete = new ControllerTemplete();

$templete-> ctrBingTemplete();
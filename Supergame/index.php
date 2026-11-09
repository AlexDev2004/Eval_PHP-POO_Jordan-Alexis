<?php
require_once __DIR__.'/env.php'; 
require_once __DIR__.'/utils/utils.php'; 
require_once __DIR__.'/Model/Model.php'; 
require_once __DIR__.'/Model/ModelPlayer.php'; 
require_once __DIR__.'/View/View.php'; 
require_once __DIR__.'/View/ViewHome.php'; 
require_once __DIR__.'/Controller/Controller.php'; 
require_once __DIR__.'/Controller/ControllerHome.php'; 


$modelPlayer = new ModelPlayer();
$viewHome = new ViewHome();
$controllerHome = new ControllerHome($modelPlayer , $viewHome);

$controllerHome->registerPlayer();
$controllerHome->displayPlayers();
$controllerHome->render();
?>
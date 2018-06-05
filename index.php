<?php
if (isset($_REQUEST['c'])) {
    $controller = $_REQUEST['c'];
    $controller = strtolower($controller);
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller)."Controller";
    $controller = new $controller;
    $action = $_REQUEST['a'] ? $_REQUEST['a']:"main";
    call_user_func($controller,$action);
}else{
  $controller = "views";
  $controller = strtolower($controller);
  require_once "controller/$controller.controller.php";
  $controller = ucwords($controller)."Controller";
  $controller = new $controller;
  $controller->main();
}
?>

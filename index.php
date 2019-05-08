<?php session_start();
define("INDEX", ""); // УСТАНОВКА КОНСТАНТЫ ГЛАВНОГО КОНТРОЛЛЕРА

require_once 'cfg/core.php'; // ПОДКЛЮЧЕНИЕ ЯДРА

// ПОДКЛЮЧЕНИЕ К БД
$db = new MyDB();
$db->connect();

//$m = array(
//    0 =>array("Каталог",'catalog'),
//    1 =>array('О нас','we'));
//if (empty($_GET["page"]))
//    include ("com/nach.php");
//else if ($_GET["page"] == "main")
//    include ("com/home.php");
//else if ($_GET["page"] == "main")
//    include ("com/page.php");
//
//// ГЛАВНЫЙ КОНТРОЛЛЕР
//if (empty($_GET["page"]))
//    include ("com/nach.php");
//else{
//    switch ($_GET["page"]) {
//        case "main":
//            include ("com/home.php");
//            break;
//        case "we":
//            //include ("com/nach.php");
//            include ("com/page.php");
//            // include ("com/template.php");
//            break;
////        default:
////            include ("com/nach.php");
////            break;
//    }
switch ($_GET["page"]) {
    case "main":
        include ("com/home.php");
        break;
   case "we":
       //include ("com/nach.php");
      include ("com/page.php");
      // include ("com/template.php");
        break;
    default:
        include ("com/nach.php");
        break;
}
include ("com/template.php");
$db->close();
<?php
defined('INDEX') OR die('Прямой доступ к странице запрещён!');

define( '_JEXEC', 1 );
/* КОМПОНЕНТ СТРАНИЦЫ */

$query = "SELECT * FROM pages WHERE page_alias='main' AND page_publish='Y' LIMIT 1";

$db->run($query);
//$db->row();
//$db1[] = $db->row();
//$db->fetch();
//if ($db->connect())
//{
//    echo "нет конекта" . "<br />";
//}
//if ($db->run($query))
//{
//    echo "нет селекта" . "<br />";
//}
//if ($db->row())
//{
//    echo "не могу использовать базу" . "<br />";
//}
//if ($db->fetch())
//{
//    echo "нет фетча" . "<br />";
//}
// ПЕРЕМЕННЫЕ КОМПОНЕНТА
//$id = $db1[0];
//$alias = $db1[1];
//$title = $db1[2];
//$h1 = $db1[3];
//$meta_d = $db1[4];
//$meta_k = $db1[5];
//$s_desc = $db1[6];
//$component = $db1[7];

$id = $db->data["page_id"];
$alias = $db->data["page_alias"];
$title = $db->data["page_title"];
$h1 = $db->data["page_h1"];
$meta_d = $db->data["page_meta_d"];
$meta_k = $db->data["page_meta_k"];
$s_desc = $db->data["page_s_desc"];
$component = $db->data["page_content"];
// ЕСЛИ СТРАНИЦЫ НЕ СУЩЕСТВУЕТ
if (!$id) {
////
//  //  echo $db->connect();
////    echo $db->run($query);
////    echo $db->row();
////    echo $db->fetch();
//  //  echo $db->data[page_id];
//   // echo "<br />";

    header("HTTP/1.1 404 Not Found");
   $component = "ОШИБКА 404! Данной страницы не существует";
}

$db->stop();
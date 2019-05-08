<?php

define( '_JEXEC', 1 );
//defined('INDEX') OR die('Прямой доступ к странице запрещён!');
/* КОМПОНЕНТ СТРАНИЦЫ */
//require_once 'cfg/core.php'; // ПОДКЛЮЧЕНИЕ ЯДРА

// ПОДКЛЮЧЕНИЕ К БД
   $dblogin = "root"; // ВАШ ЛОГИН К БАЗЕ ДАННЫХ
   $dbpass = ""; // ВАШ ПАРОЛЬ К БАЗЕ ДАННЫХ
   $db = "mysite"; // НАЗВАНИЕ БАЗЫ ДЛЯ САЙТА
     $dbhost="127.0.0.1";




        $link = mysqli_connect($dbhost, $dblogin, $dbpass, $db);
        mysqli_select_db($link, $db);
        mysqli_query( $link, 'SET NAMES utf8');



function search ($query, $link)
{
    $u= "GHBkhgjjh";
    $query = trim($query); //убираем пробелы лишние
    $query = mysqli_real_escape_string($link, $query);//Экранирует специальные символы в строке для использования в SQL-выражении
    $query = htmlspecialchars($query);//Преобразует специальные символы в HTML-сущности

    if (!empty($query))
    {
        if (strlen($query) < 3) {
            $text = '<p>Слишком короткий поисковый запрос.</p>';
        } else if (strlen($query) > 128) {
            $text = '<p>Слишком длинный поисковый запрос.</p>';
        } else {
            $q = "SELECT page_id, page_meta_d, page_h1
                  FROM pages WHERE page_h1 LIKE  '%$query%' OR page_title LIKE '%$query%'
                  OR page_s_desc LIKE '%$query%' OR page_content LIKE '%$query%'";

            $result = mysqli_query($link, $q);

            if (mysqli_affected_rows($link) > 0) {
                $row = mysqli_fetch_assoc($result);
                $num = mysqli_num_rows($result);

                $text = '<p>По запросу <b>'.$query.'</b> найдено совпадений: '.$num.'</p>';

                do {
                    // Делаем запрос, получающий ссылки на статьи
                    $q1 = "SELECT page_meta_d FROM page WHERE page_id = '$row[page_id]'";
                    $result1 = mysqli_query($link, $q1);

//                    if (mysqli_affected_rows($link) > 0) {
//                        $row1 = mysqli_fetch_assoc($result1);
//                    }


 $text .= '<p><a href="'.$row['page_meta_d'].'">'.$row['page_h1'].'</a></p>';
                } while ($row = mysqli_fetch_assoc($result));
            } else {
                $text = '<p>По вашему запросу ничего не найдено.</p>';
            }
        }
    }
    if ($text)
        return $text;
    else
        return $u;
}

?>
<?php
if (!empty($_POST['query'])) {
    $search_result = search ($_POST['query'], $link);
    echo $search_result;
}
else
    echo "Задан пустой поисковый запрос.";
mysqli_close($link);
?>

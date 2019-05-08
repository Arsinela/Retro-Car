<?php defined('INDEX') ;

// MYSQL
class MyDB
{
    var $dblogin = "root"; // ВАШ ЛОГИН К БАЗЕ ДАННЫХ
    var $dbpass = ""; // ВАШ ПАРОЛЬ К БАЗЕ ДАННЫХ
    var $db = "mysite"; // НАЗВАНИЕ БАЗЫ ДЛЯ САЙТА
    var $dbhost="127.0.0.1";

   var $link;
    var $query;
    var $err;
    var $result;
    var $data;
    var $fetch;

    function connect() {
        $this->link = mysqli_connect($this->dbhost, $this->dblogin, $this->dbpass, $this->db) or die("Ошибка " . mysqli_error($this->link));
        mysqli_select_db($this->link, $this->db);
        mysqli_query( $this->link, 'SET NAMES utf8');
        return $this->link;
    }

    function close() {
        mysqli_close($this->link);
    }
//$link = mysqli_connect($host, $user, $password, $database)
//or die("Ошибка " . mysqli_error($link));
//
//// выполняем операции с базой данных
//$query ="SELECT file from test";
//$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
//if($result)
//{
//echo "Выполнение запроса прошло успешно" . "<br />";
//$row = $result->fetch_assoc();
//foreach ($row as $value)
//echo $value. "<br />";

    function run($query) {
        $this->query = $query;
        $this->result = mysqli_query($this->link,$this->query) or die("Ошибка " . mysqli_error($this->link));
        if ($this->result = mysqli_query($this->link,$this->query)) {

            /* извлечение ассоциативного массива */
            while ($this->data = mysqli_fetch_assoc($this->result)) {
                $this->fetch = $this->data;
                return $this->fetch;
            }

           // printf ("%s (%s)\n", $this->fetch["page_id"], $this->fetch["page_h1"]);
//        $this->query = $query;
//        $this->result = mysqli_query($this->link,$this->query)or die("Ошибка run" . mysqli_error($this->link));
//        $this->err = mysqli_error($this->link);
//        return $this->result;
    }}

//    function search ($query)
//    {
//        $u= "GHBkhgjjh";
//      $query = trim($query); //убираем пробелы лишние
//        $query = mysqli_real_escape_string($this->link, $query);//Экранирует специальные символы в строке для использования в SQL-выражении
//        $query = htmlspecialchars($query);//Преобразует специальные символы в HTML-сущности
//
//        if (!empty($query))
//        {
//            if (strlen($query) < 3) {
//                $text = '<p>Слишком короткий поисковый запрос.</p>';
//            } else if (strlen($query) > 128) {
//                $text = '<p>Слишком длинный поисковый запрос.</p>';
//            } else {
//                $q = "SELECT page_id
//                  FROM pages WHERE page_h1 LIKE  '$query'
//                  OR page_s_desc LIKE '$query' OR page_content LIKE '$query'";
//
//                $result = mysqli_query($this->link, $q);
//
//                if (mysqli_affected_rows($this->link) > 0) {
//                    $row = mysqli_fetch_assoc($result);
//                    $num = mysqli_num_rows($result);
//
//                    $text = '<p>По запросу <b>'.$query.'</b> найдено совпадений: '.$num.'</p>';
//
//                    do {
//                        // Делаем запрос, получающий ссылки на статьи
//                        $q1 = "SELECT page_meta_d FROM page WHERE page_id = '1'";
//                        $result1 = mysqli_query($this->link, $q1);
//
//                        if (mysqli_affected_rows($this->link) > 0) {
//                            $row1 = mysqli_fetch_assoc($result1);
//                        }
//
//                        $text .= '<p>'.$row['page_s_desc'].'</p>';
//
//                    } while ($row = mysqli_fetch_assoc($result));
//                } else {
//                    $text = '<p>По вашему запросу ничего не найдено.</p>';
//                }
//            }
//        }
//if ($text)
//        return $text;
//else
//    return $u;
//    }
//    function row() {
//        $this->data = mysqli_fetch_assoc($this->result)or die("Ошибка row" . mysqli_error($this->link));
//        return $this->data;
//    }
//    function fetch() {
//       while ($this->data = mysqli_fetch_assoc($this->result)) {
//            $this->fetch = $this->data or die("Ошибка fetch" . mysqli_error($this->link));
//            return $this->fetch;
//        }
//    }
function t ($s)
{
    if (!empty($s)) {
        $search_result = $this -> search ($s);
        return $search_result;
    }
    else
        return $s;
}
    function stop() {
        unset($this->data);
        unset($this->result);
        unset($this->fetch);
        unset($this->err);
        unset($this->query);
    }

}?>
<?php
//if (!empty($_POST['query'])) {
//    $search_result = $this -> search ($_POST['query']);
//    echo $search_result;
//}
//else
//    echo "Задан пустой поисковый запрос.";
//?>
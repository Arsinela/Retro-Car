<?php
//$name = $_POST['nameart'];
//$text = $_POST['text1'];
//if ($_POST['menu'])
//    $menu = $_POST['menu'];
//else $menu = $name;
//$db = mysqli_connect('127.0.0.1', 'root', '', 'dealership');
//$query = "INSERT INTO test2 (name, text, menu) VALUES ('$name', '$text', '$menu')";
//$result = mysqli_query($db, $query);
//mysqli_close($db);
//if ($result)
//    echo 'Статья успешно добавлена';
//?>
<?php
    function run($link, $query) {
    $query = $query;
    $result = mysqli_query($link,$query);
    if ($result = mysqli_query($link,$query)) {

    /* извлечение ассоциативного массива */
    while ($data = mysqli_fetch_assoc($result)) {
    $fetch = $data;
    return $fetch;
    }
    }}
?>
<?php
$db = mysqli_connect('127.0.0.1', 'root', '', 'auto');
$query = "SELECT count(*) as count FROM auto";
$result12 = run($db, $query);
$result11=$result12["count"];
$query2 = "select count(*) as count1 from page_site";
//"select count(*) as count2 FROM page_site";
$id_p = run($db, $query2);
$id_page2 = $id_p["count1"];
$id_page = $id_page2+1;
$idAuto = $result11+1;
$title = $_POST['marc'];
$photo = $_POST['photo'];
$color = $_POST['color'];
$price = $_POST['price'];
$model = $_POST['model'];
$class = $_POST['class'];
$label = $_POST['label'];
$engine = $_POST['engine'];
$transmission = $_POST['transmission'];
if ($_POST['menu'])
    $menu = $_POST['menu'];
else $menu = $name;

$query4 = "INSERT INTO page_site VALUES ( '$id_page', '$title')";
$result = mysqli_query($db, $query4);
if ($result)
{
    $query3 = "INSERT INTO auto VALUES ('$idAuto', '$class', '$model', '$price', '$label', '$id_page', '$photo', '$color', '$engine', '$transmission')";
    $result1 = mysqli_query($db, $query3);
   }
mysqli_close($db);
if ($result1)
    echo 'Статья успешно добавлена';
else
echo "Не удалось добавить статью";

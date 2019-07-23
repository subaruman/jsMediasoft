<?php
include "index.html";
$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
$user = 'root'; //имя пользователя, по умолчанию это root
$password = ''; //пароль, по умолчанию пустой
$db_name = 'phpcourse'; //имя базы данных

$link = mysqli_connect($host, $user, $password, $db_name);


$query = "SELECT dateLoad FROM input ORDER BY ID DESC LIMIT 1";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$date = mysqli_fetch_array($result);

$query = "SELECT ID, LEFT(inputText, 80) FROM input 
ORDER BY ID DESC LIMIT 1";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$text = mysqli_fetch_array($result);
printr($text);

$query = "SELECT totalWords FROM input ORDER BY ID DESC LIMIT 1";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$wordsCnt = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <style>
        table{
            border: 1px solid black;
            margin: 10px;
            text-align: center;
        }
        td{
            border: 1px solid black;
        }
        tr{
            /*border: 1px solid black;*/
        }
    </style>
    <title>Tables</title>
</head>
<body>
<table>
    <tr>
        <td>
            Дата загрузки

        </td>
        <td>
            Текст
        </td>
        <td>
            Общее количество слов
        </td>
    </tr>
    <tr>
        <td>
            <?php echo "$date[dateLoad]"; ?>
        </td>
        <td>
            <?php echo "$text[1]"; ?>
        </td>
        <td>
            <?php echo "$wordsCnt[totalWords]"; ?>
        </td>
    </tr>

</table>
<form action="download.php">
    <input type="submit" value="Скачать .csv файл">
</form>
<form >
    <input type="submit" value="Детальный просмотр">
</form>
</body>
</html>


<?php
function printr($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}



?>
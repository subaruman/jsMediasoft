<?php
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding("UTF-8");
include "index.html";
global $filename;
$filename= 0;
$inputStr = "";
$countWords = 0;
if (!empty($_POST['string'])) {
    $inputStr = $_POST['string'];
    $filename++;
   $countWords = strCount($inputStr, $filename);
}

echo "<br><br>";

if (!empty($_POST['loadfile'])) {
    $fileStr = file_get_contents($_POST['loadfile']);
    $fileStr = removeBOM($fileStr);
    $filename++;
    $countWords = strCount($fileStr, $filename);
}

echo $filename;
?>


<?php
$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
$user = 'root'; //имя пользователя, по умолчанию это root
$password = ''; //пароль, по умолчанию пустой
$db_name = 'phpcourse'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
$link = mysqli_connect($host, $user, $password, $db_name);

//Устанавливаем кодировку (не обязательно, но поможет избежать проблем):
mysqli_query($link, "SET NAMES 'utf8'");

$timezone = date_default_timezone_get();
$today = date("Y-m-d");

if (!empty($fileStr)){
    $inputFile = mysqli_real_escape_string($link, $fileStr);
}

if (!empty($inputStr))
{
    $inputText =  mysqli_real_escape_string($link, $inputStr);
}

$dateLoad = mysqli_real_escape_string($link, $today);
$totalWords = mysqli_real_escape_string($link, $countWords);

if (!empty($inputText)){
$query = "INSERT INTO input (inputText, dateLoad, totalWords)
VALUES ( '$inputStr', '$dateLoad', '$totalWords')";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
}

global $word, $cntEntries;
if (!empty($word)){
for ($i = 0; $i < $countWords; $i++){
    $wordSql = mysqli_real_escape_string($link, $word[$i]);
    $cntEntriesSql = mysqli_real_escape_string($link, $cntEntries[$i]);
    $query = "INSERT INTO result (word, cntEntries)
                VALUES ( '$wordSql', '$cntEntriesSql')";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
}
}

if (!empty($fileStr)){
    $query = "INSERT INTO input (inputText, dateLoad, totalWords)
VALUES ( '$inputFile', '$dateLoad', '$totalWords')";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
}
?>





<?php

function strCount($str, $filename)
{
    global $cntEntries, $word;
    $cntWord = str_word_count($str, 0, 'АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя');
    $arr = str_word_count($str, 1, 'АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя');
    $fcsv = fopen(strval($filename), 'w');
    for ($i = 0; $i < $cntWord; $i++) {
            $cntVhod = mb_substr_count($str, $arr[$i]);
            $totalArr[$i] = $arr[$i] . " : " . $cntVhod . PHP_EOL;
            $word[$i] = $arr[$i];
            $cntEntries[$i] = $cntVhod;
    }
    if (!empty($totalArr)) {
        printr($totalArr);
        echo "<br>";
//        echo PHP_EOL . "количество слов в тексте = " . $cntWord . PHP_EOL;
        fputcsv($fcsv, $totalArr);
    }
    fclose($fcsv);
    return $cntWord;
}



function removeBOM($str = "")
{
    if (substr($str, 0, 3) == pack('CCC', 0xef, 0xbb, 0xbf)) {
        $str = substr($str, 3);
    }
    return $str;
}

function printr($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

?>


<!--Lorem Ipsum - это текст - часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной для текстов
на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и
форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений
пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с
образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной
вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.";
-->

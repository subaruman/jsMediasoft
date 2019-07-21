<?php
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding("UTF-8");
include "index.html";
$filename = 0;
if (!empty($_POST['string'])){
    $inputStr = $_POST['string'];
    $filename++;
    strCount($inputStr, $filename);
}


echo "<br><br>";

function strCount($str, $filename){
$cntWord = str_word_count($str, 0, 'АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя');
$arr = str_word_count($str, 1, 'АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя');
    $fcsv = fopen(strval($filename), 'w');
    for ($i = 0; $i < $cntWord; $i++)
    {
        $cntVhod = mb_substr_count($str, $arr[$i]);
        $totalArr[$i] = $arr[$i] . " : " . $cntVhod . "\n";

    }

if (!empty($totalArr)){
        printr($totalArr);
        echo "<br>";
        echo PHP_EOL . "количество слов в тексте = " . $cntWord . PHP_EOL;
        fputcsv($fcsv, $totalArr);
        }
    fclose($fcsv);
}

if (!empty($_POST['loadfile'])){
    $fileStr = file_get_contents($_POST['loadfile']);
    $fileStr = removeBOM($fileStr);
    $filename++;
    strCount($fileStr, $filename);
}

function removeBOM($str="") {
    if(substr($str, 0, 3) == pack('CCC', 0xef, 0xbb, 0xbf)) {
        $str = substr($str, 3);
    }
    return $str;
}

function printr($var) {
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

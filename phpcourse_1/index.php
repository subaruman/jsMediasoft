<?php
$str = "Lorem Ipsum - это текст - часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной для текстов 
на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и 
форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений 
пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с 
образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной 
вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.";

$cntWord = str_word_count($str, 0, 'АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя');

$arr = str_word_count($str, 1, 'АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя');
for ($i=0; $i < $cntWord; $i++)
{
    $cntVhod = substr_count($str, $arr[$i]);
    $totalArr[$arr[$i]] = $cntVhod;
}
print_r($totalArr);

echo PHP_EOL . "количество слов в тексте = " . $cntWord . PHP_EOL;
?>
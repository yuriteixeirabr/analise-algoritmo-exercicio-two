<?php
/**
 * Created by IntelliJ IDEA.
 * User: ANALISTA
 * Date: 08/02/2019
 * Time: 19:44
 */
$executionStartTime = microtime(true);
$file = fopen('dataset-2-e.csv', 'r');
$arrayCsv = array();
while (!feof($file)) {
    $fpTotal = fgetcsv($file);
    array_push($arrayCsv, $fpTotal[0]);
}
fclose($file);

if (($myfile = fopen('resposta-dataset-2-e.txt', "a")) !== false) {
    fwrite($myfile, (max($arrayCsv) . "\n"));
    $executionEndTime = microtime(true);
    $seconds = $executionEndTime - $executionStartTime;
    fwrite($myfile, $seconds);
    fclose($myfile);
}
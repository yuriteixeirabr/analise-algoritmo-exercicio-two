<?php
/**
 * Created by IntelliJ IDEA.
 * User: ANALISTA
 * Date: 08/02/2019
 * Time: 19:44
 */
$executionStartTime = microtime(true);
$file = fopen('dataset-1-c.csv', 'r');
$arrayCsv = array();
while (!feof($file)) {
    $fpTotal = fgetcsv($file);
    array_push($arrayCsv, $fpTotal);
}
fclose($file);

if (($myfile = fopen('resposta-dataset-1-c.txt', "a")) !== false) {
    for ($i = 2; $i < count($arrayCsv); $i++) {

        if ($arrayCsv[$i][0] == $arrayCsv[0][0]) {

            $txt = "True\n";
            fwrite($myfile, $txt);
            $txt = $i . "\n";
            fwrite($myfile, $txt);
            $executionEndTime = microtime(true);
            $seconds = $executionEndTime - $executionStartTime;
            fwrite($myfile, $seconds);
            fclose($myfile);
            break;
        }

        if ($i == count($arrayCsv) - 1) {
            $txt = "False\n";
            fwrite($myfile, $txt);
            $txt = "-1\n";
            fwrite($myfile, $txt);
            $executionEndTime = microtime(true);
            $seconds = $executionEndTime - $executionStartTime;
            fwrite($myfile, $seconds);
            fclose($myfile);
        }
    }
}
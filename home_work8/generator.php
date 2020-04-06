<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

function GeneratorCsv ($path)
{
    $csv = fopen($path,'r');

    while ($line = fgets($csv)) {
        yield explode(",",$line);
    }

}

foreach (GeneratorCsv (__DIR__ . '/cats.csv') as $row) {
    echo "<pre>".print_r($row , true)."<pre>";
}
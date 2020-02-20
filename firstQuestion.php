<?php
//Function for finding the most repetitive word
//setlocale(LC_ALL, 'ru');

//open file and read contents
$myfile = fopen("text.txt", "r") or die("Unable to open file!");
$text = fread($myfile,filesize("text.txt"));
fclose($myfile);


function findWord($text) {

    $results = [];
    $words = explode(" ", $text);
    
    // $words = array_change_key_case($words, CASE_LOWER);

    foreach ($words as &$word) {

        $word = strtolower($word);
        $word = rtrim($word, ",.");
        
    }

    $results = array_count_values($words);
    asort($results, SORT_NUMERIC);
    end($results);

    // $result = array_key_last($results);
    $result = key($results);
    echo "Найбільш повторюване слово -> $result, зустрічається = {$results[$result]} (раз/разів).";

}

findWord($text);

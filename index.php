<?php
/**
 * Created by PhpStorm.
 * User: yuda
 * Date: 24/03/19
 * Time: 13:21
 */

// get file content from url
$data = file_get_contents("https://gist.githubusercontent.com/tymat/03c0944ea1a280948c2e8fc9e41ffc10/raw/d396e6ee86f8dc8ab6b2855261938f3343445c43/LoremIpsum.md");

// convert to lowercase
$lowData = strtolower($data);

// create associative array
$whole = array();

// remove non word character except space
$cleanData = preg_replace("/\W+/"," ", $lowData);

// explore string into array
$array = explode(" ", $cleanData);

// read each word
foreach ($array as $word) {
    // if this word already exist in array
    if (isset($whole[$word])){
        $whole[$word]++; // then value is incremented
    } else {
        $whole[$word] = 1; // then value is set to just 1
    }
}

// sorting array based on its value in descending order
arsort($whole);

// show result
echo "The top 3 words of this text are : <br>";
$count = 1; // loop counter
foreach ($whole as $key=>$value) {
    if ($count >3){ // break after 3rd loop
        break;
    }
    // show result
    echo $count.". ".$key ." = ". $value ." occurences";
    echo "<br>";
    $count++; // increment loop counter
}

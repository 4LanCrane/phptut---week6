<?php
require_once 'utils.php';

//this will be the output
$html = '';

//wrap the string 'Hello, world!' in an h1 tag using the wrap_html function we created
$h1 = wrap_html('h1', 'Hello, world!');
//append the h1 tag to the $html string
$html .= $h1;

//- declare a simple array with names
$names = array('John', 'Jane', 'Joe', 'Jill', 'Alan', 'Alice', 'Bob', 'Barbara');

//- sort the array of names alphabetically 
sort($names, SORT_STRING);
//- loop over the array to output an unordered list <ul> with a list item <li> for each name
$ul = '';
foreach ($names as $name) {
    $ul .= wrap_html('li', $name);
}
$html .= wrap_html('ul', $ul);


// - research an appropriate function on php.net to reverse the order of letters in a string
$ulReversed = '';
foreach ($names as $name) {
    $ulReversed .= wrap_html('li', strrev($name));
}
$html .= wrap_html('ul', $ulReversed);


//- create a string with all names separated by commas and output the result in a paragraph <p>
$html .= wrap_html('p', implode(',', $names));


//- count the total number of letters in all names and output the result in a paragraph <p> 
$count = 0;
foreach ($names as $name) {
    $count += strlen($name);
}
$html .= wrap_html('p', "total number of letters in all names: $count");


//Further extend the code in index.php 
//- output a heading <h1> with the content "Associative Arrays" 
//- declare an associative array matching country names to population 
//- programmatically output a table listing countries and their population

$html .= wrap_html("h1", "Associative Arrays");

$countires = array(
    'UK' => 1002,
    'USA' => 328,
    'Germany' => 83,
    'India' => 1380,
    'China' => 61440
);

$table = '';
foreach ($countires as $name => $population) {
    $td_name = wrap_html('td', $name);
    $td_pop = wrap_html('td', $population);
    $table .= wrap_html('tr', $td_name . $td_pop);
}
$html .= wrap_html('table', $table);



//- output a heading <h1> with the content "Multi-dimensional Arrays" 
$html .= wrap_html("h1", "Multi-dimensional Arrays");
//- declare a multi-dimensional array with usernames, number of followers and number of posts 
$users = array(
    array('username' => 'John332', 'followers' => 100, 'posts' => 15),
    array('username' => 'Jane3124', 'followers' => 200, 'posts' => 20),
    array('username' => 'jeff3213', 'followers' => 300, 'posts' => 380),
    array('username' => 'jill556', 'followers' => 400, 'posts' => 40),
    array('username' => 'Alan88', 'followers' => 500, 'posts' => 950),
    array('username' => 'denis12', 'followers' => 600, 'posts' => 9680)
);
//- encode the array in JSON format and output the result in a <textarea> element (extra points for researching how to “pretty print” JSON)
$html .= wrap_html('textarea', json_encode($users, JSON_PRETTY_PRINT));

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PHP introduction (2)</title>
    <style>
        textarea {
            width: 100%;
            height: 200px;
        }
    </style>
</head>

<body>

    <?php
    //output the $html string
    echo $html;
    ?>
</body>
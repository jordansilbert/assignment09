<?php


//Read the CSV file in the data subdirectory into an array.

function make_list() {
    //create empty array
    $archery_data = [];
    //fill array with terms and definitions
    $archery_data = array_map('str_getcsv', file('data/archery_terms.csv'));
    //return 2D array
    return $archery_data;
}

//Convert the normal array to an associative array, and sort the associative array by keys.

function convert_data($archery_data) {
    //initialize array
    $archery_inventory = [];
    //fill in array by defining keys and values
    foreach ($archery_data as $term) {
        $archery_inventory[$term[0]]=$term[1];
    }
    //sort array alphabetically by key
    ksort($archery_inventory);
    //return array
    return $archery_inventory;
}


//Create a dl list from the sorted array.

function create_dl($archery_inventory) {
    //starts dl tag for HTML
    echo "<dl>";
    //echo each key and term so it will print out in HTML container
    foreach ($archery_inventory as $key=>$value) {
        echo "<dt>$key</dt>";
        echo "<dd>$value</dd>";
    }
    //close HTML dl tag
    echo "</dl>";
}






//function calls
$archery_data = make_list();
$display = convert_data($archery_data);
create_dl($display);


?>
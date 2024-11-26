<?php
// Fetch the data from the Bahrain Open Data Portal API
$URL = 'https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100';
$response = file_get_contents($URL);

// Check if data was fetched successfully
if ($response === FALSE) {
    die('Error occurred while fetching data');
}

// Decode the JSON response
$result = json_decode($response, true);

// Check if decoding was successful
if ($result === NULL) {
    die('Error occurred while decoding JSON data');
}
?>


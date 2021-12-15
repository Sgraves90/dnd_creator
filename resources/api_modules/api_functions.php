<?php
Echo json_encode(array("Test Value"=>'Test value shit'));


function curl_request()
{
// create & initialize a curl session
    $curl = curl_init();
// set our url with curl_setopt()
    curl_setopt($curl, CURLOPT_URL, "https://www.dnd5eapi.co/api/");
// return the transfer as a string, also with setopt()
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// curl_exec() executes the started curl session
// $output contains the output string
    $output = curl_exec($curl);

// close curl resource to free up system resources
// (deletes the variable made by curl_init)
    curl_close($curl);
    $output = json_decode($output);
    return $output;
}
function get_races($_POST)
{
    $_POST = json_decode($_POST);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://www.dnd5eapi.co/api/");

}

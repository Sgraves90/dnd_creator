<?php

$ajax_array = $_POST;

//Echo json_encode(array($ajax_array));
//Echo $ajax_array;

switch ($ajax_array["function_call"])
{
    case 'delete_character':
        delete_char($ajax_array);
        break;
    default:
        echo "Invalid function call";
}
function delete_char($char_array)
{
    $char_id = $char_array["data_type"];

    if(intval($char_id)==true)
    {
        $servername = "157.230.55.156";
        $username = "sgraves";
        $password = "123Password";
        $dbname = "production";

        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            ddd("Connection failed: " . $conn->connect_error);
        }



        $sql = "Delete FROM production.characters WHERE id = $char_id";
        $result = $conn->query($sql);


        $sql = "Delete FROM production.proficient_skills WHERE character_id = $char_id";
        $result = $conn->query($sql);


        $sql = "Delete FROM production.saving_throws WHERE character_id = $char_id";
        $result = $conn->query($sql);

        $output = json_encode("Character Deleted");

    }
    $output = json_encode("error");

}
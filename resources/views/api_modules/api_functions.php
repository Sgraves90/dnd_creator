<?php
$ajax_array = $_POST;

//Echo json_encode(array($ajax_array));
//Echo $ajax_array;

switch ($ajax_array["function_call"])
{
    case 'races':
        get_races($ajax_array);
        break;

    case 'classes':
        get_classes($ajax_array);
        break;

    case 'alignment':
        get_alignment($ajax_array);
        break;

    case 'character_details':
        get_character_details($ajax_array);
        break;

    default:
        Echo json_encode(array($ajax_array));
}

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
function get_races($race_info)
{
    $url_part = strtolower($race_info["data_type"]);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://www.dnd5eapi.co/api/races/$url_part");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   $output = curl_exec($curl);
      Echo $output;
}

function get_classes($class_info)
{
    $url_part = strtolower($class_info["data_type"]);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://www.dnd5eapi.co/api/classes/$url_part");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    Echo $output;
}
function get_alignment($class_info)
{
    $url_part = strtolower($class_info["data_type"]);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://www.dnd5eapi.co/api/alignments/$url_part");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    Echo $output;
}

function get_character_details($char_details)
{
    $char_name_id = $char_details["data_type"];

    $servername = "157.230.55.156";$username = "sgraves";$password = "123Password";$dbname = "production";

    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        ddd("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT character_name, alignment, race, class FROM production.characters WHERE id = $char_name_id";
    $result = $conn->query($sql);

    if($result->num_rows == 0)
    {
        $output = "Error Pull Character Information";
    }
    else{
        $row = $result->fetch_assoc();
        $return_array=$row;
    }
    // lets get characters proficiency skills
    $proficiencies_array=[];
    $saving_throws_array=[];

    $sql = "SELECT skill,skill_url FROM production.proficient_skills WHERE character_id = $char_name_id";
    $result = $conn->query($sql);

    if($result->num_rows == 0)
    {
        $output = "Error Pull Character Information";
    }
    else{
        while ($row = $result->fetch_assoc())
        {
            array_push($proficiencies_array,$row);
        }
    }
    $return_array['proficiencies']=$proficiencies_array;

    //Lets get Saving Throws
    $sql = "SELECT attribute FROM production.saving_throws WHERE character_id = $char_name_id";
    $result = $conn->query($sql);

    if($result->num_rows == 0)
    {
        $output = "Error Pull Character Information";
    }
    else{
        while ($row = $result->fetch_assoc())
        {
            array_push($saving_throws_array,$row);
        }
    }
    $return_array['saving_throws']=$saving_throws_array;

//    echo json_encode($row);

//    lets grab class info first
    $url_base = 'https://www.dnd5eapi.co/api/';
    $url_part = strtolower('classes/'.$return_array['class']);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url_base.$url_part);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    $class_array = json_decode($output,true);
    $return_array['hit_die'] = $class_array['hit_die'];
    $return_array['starting_equipment'] = $class_array['starting_equipment'];




    //    now lets grab races
    $url_base = 'https://www.dnd5eapi.co/api/';
    $url_part = strtolower('races/'.$return_array['race']);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url_base.$url_part);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    $race_array = json_decode($output,true);
    $return_array['speed'] = $race_array['speed'];
    $return_array['age'] = $race_array['age'];
    $return_array['size'] = $race_array['size'];
    $return_array['size_description'] = $race_array['size_description'];




//    echo json_encode($proficiencies_array);
    echo json_encode($return_array);
}


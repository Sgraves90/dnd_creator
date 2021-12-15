<?php
use \App\Http\Controllers\HomeController;
// Get the currently authenticated user...

$user = Auth::user();
$user_id = Auth::id();

$servername = "157.230.55.156";
$username = "sgraves";
$password = "123Password";
$dbname = "production";

//Lets make sure all the data is there before we begin
foreach ($_POST as $value_check=>$data)
{
    if(!isset($data)||$data=="")
    {
        echo $value_check. "is not set: ".$data;
    }

}
//ddd("made it too far");

$character_name = $_POST["char_name"];
$alignment_select = $_POST["alignment_select"];
$race_select = $_POST["race_select"];
$class_select = $_POST["class_select"];
$cha_select = $_POST["cha_select"];
$con_select = $_POST["con_select"];
$dex_select = $_POST["dex_select"];
$int_select = $_POST["int_select"];
$str_select = $_POST["str_select"];
$wis_select = $_POST["wis_select"];
$saving_throws_array=json_decode($_POST["saving_throws_json"],true);
$prof_bonus_array=json_decode($_POST["prof_bonus_json"],true);


//ddd($_POST);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    ddd("Connection failed: " . $conn->connect_error);
}
$sql = "Insert Into production.characters(user_id,character_name,alignment,race,class,cha,con,dex,`int`,str,wis)
           VALUES ($user_id,'$character_name','$alignment_select','$race_select','$class_select',$cha_select,$con_select,$dex_select,$int_select,$str_select,$wis_select)";
$result = $conn->query($sql);
$char_insert_id=$conn->insert_id;
if(!isset($char_insert_id ) || $char_insert_id < 1)
{
    //insert went wrong bail out
    ddd($char_insert_id." || ".$sql);
}
//else lets get saving_throws data and insert
foreach ($saving_throws_array as $saving_throw_object=>$array_key)
{
    $st_name = $array_key['name'];
    $st_url = $array_key['url'];
    // should have all the data needed for an insert by now;
    $sql = "Insert into production.saving_throws(user_id,character_id,attribute,attr_url)
            VALUES('$user_id','$char_insert_id','$st_name','$st_url')";
    $result = $conn->query($sql);
    $st_insert_id=$conn->insert_id;
    if(!isset($st_insert_id ) || $st_insert_id < 1)
    {
        //insert went wrong bail out
        ddd($st_insert_id);
    }

}
// we should have inserted saving_throw info now move onto proficiency bonuses
foreach ($prof_bonus_array as $prof_bonus_object=>$array_key)
{
    $ps_name = $array_key['index'];
//    $ps_url = $array_key['url'];
    $ps_url="/api/proficiencies/".$ps_name;
    // should have all the data needed for an insert by now;

    $sql = "Insert into production.proficient_skills(user_id,character_id,skill,skill_url)
            VALUES('$user_id','$char_insert_id','$ps_name','$ps_url')";
    $result = $conn->query($sql);
    $ps_insert_id=$conn->insert_id;
    if(!isset($ps_insert_id ) || $ps_insert_id < 1)
    {
        //insert went wrong bail out
        ddd($ps_insert_id);
    }

}
// at this point we have inserted all the necessary data. Lets return the user to a confirmation page
//ddd($_POST);
header("Location: http://www.dndcharactercreation.com/home");
exit();

//return redirect()->to('/');
//ddd($_POST);
?>